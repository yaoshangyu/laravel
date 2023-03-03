<?php

use Swoole\WebSocket\Server as WebSocketServer;

class WebSocket{


    public $swoole;

    public function __construct($ip,$port){

        $this->swoole = new WebSocketServer($ip,$port);

        $this->swoole->set([

            'worker_num'      => 2, //开启2个worker进程
            'max_request'     => 4, //每个worker进程 max_request设置为4次
            'task_worker_num' => 4, //使用task进程必须设置进程数量
            'dispatch_mode'   => 4, //数据包分发策略 - IP分配
            'daemonize'       => false, //守护进程(true/false)
        ]);

        $handler = function($method,$params){
            call_user_func_array([$this,$method],$params);
        };

        $this->swoole->on("open",function() use ($handler) {

            //$this->open(...func_get_args());
            //call_user_func_array([$this,"open"],func_get_args());
            $handler("open",func_get_args());
        });

        $this->swoole->on("message",function() use ($handler) {
            $handler("message",func_get_args());
        });

        //task进程内执行
        $this->swoole->on("task",function() use ($handler) {
            $handler("task",func_get_args());
        });

        //work进程内执行
        $this->swoole->on("finish",function() use ($handler) {
            $handler("finish",func_get_args());
        });


        $this->swoole->on("close",function() use ($handler) {
            $handler("close",func_get_args());
        });
        
        $this->swoole->on("request",function() use ($handler){

             $handler("request",func_get_args());
        });
        $this->run();
    }

    public function open($server,$request){

        $server->task(["type"=>'login']);
        echo "#######Open#########".PHP_EOL;
        echo "server: handshake success with fd{$request->fd}".PHP_EOL;
    }


    public function message($server,$frame){
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->task(['type' => 'speak', 'msg' => $frame->data]);
    }

    public function task($server, $task_id, $reactor_id, $data){
        echo "#######Task#########".PHP_EOL;
        echo "work_id:{$server->work_id} work_pid:{$server->work_pid} task_id:{$task_id}".PHP_EOL;
        $msg = '';
        switch($data['type']){
            case 'login':
                $msg = '我来了';
                break;
            case 'speak':
                $msg = $data['msg'];
                break;    
        }
        if(!$msg){
            $server->finish("empty");
            return false;
        }

        foreach($server->connections as $fd){
             $connection = $server->connection_info($fd);
             if($connection['websocket_status']==3){
                echo "fd{$fd} send success".PHP_EOL;
                $server->push($fd,$msg);
             }
           
        }

        $server->finish($data);


    }

    public function finish($serv, $task_id, $data){
        $data = json_encode($data);
        echo "AsyncTask[{$task_id}] Finish: {$data}".PHP_EOL;
    }

    public function close($server,$fd){
      
        echo "#######Close#########".PHP_EOL;
        echo "client fd{$fd} close".PHP_EOL;
        echo "#######".PHP_EOL;
    }

    public function request($request,$response){
          
         $post = $request->post;
         $get = $request->get;
         $msg = $post['msg']??($get['post']??"");
         if(!$msg){
            return false;
         }

         foreach($this->swoole->connections as $fd){
            if($this->swoole->isEstablished($fd)){
                 $this->swoole->push($fd,$msg);
            }

         }
    }

    /**
     * 运行
     *
     * @return void
     */
    public function run(){

        $this->swoole->start();
    }

}


$websocket = new WebSocket('0.0.0.0',9501);