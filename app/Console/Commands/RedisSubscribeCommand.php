<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;


class RedisSubscribeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'redis subscribe';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        // Redis::subscribe(["test-channel"],function($message){
             
        //     echo $message."\r\n";

        // });
        Redis::psubscribe(["*"],function($message,$channel){
            echo "channel:".$channel." ".$message."\r\n";
        });

    }
}
