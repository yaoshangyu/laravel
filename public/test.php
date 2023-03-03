<?php




echo date('Y-m-d H:i:s');

exit;
$arr = [1,2,3];



function test($a){
  foreach($a as $k=>$v){
         echo current($a).PHP_EOL;
  }
  
}
test($arr);

exit;
$rst = test(1,2,'3');

var_dump($rst);


exit;


interface Jsonable{

   public function toJson();

}

class My implements Jsonable{
    static $a = 0;

    public static function f1(){
        static::$a =  static::$a + 1;
        return self::class;
    }
    public static function f2(){
        static::$a =  static::$a + 1;
        return self::class;

    }
    public static function f3(){
        return static::$a;
    }

    public function toJson(){



    }

}
$my = new My();
 var_dump($my instanceof Jsonable);

exit;


function listFiles($path,&$arr){


    if(is_dir($path)){
        $fp = opendir($path);
        if($fp){
            while(($line=readdir($fp))!==false){
                if($line!="." && $line!=".."){
                     if(is_file($path."/".$line)){
                          $arr[] = $path."/".$line;
                          continue;
                     }
                    listFiles($path.'/'.$line,$arr);
                }

            }
          closedir($fp);
        }
         
    }


}

$list = [];

listFiles(__DIR__,$list);
print_r($list);



exit;

class dd{
    

    public function __invoke(){

        echo 'invoke';
    }



}



$dd = new dd();





$dd();




exit;
class Point
{
    public $x;
    public $y;

    /**
     * Point constructor.
     * @param int $x  horizontal value of point's coordinate
     * @param int $y  vertical value of point's coordinate
     */
    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }
}


// $reflect = new ReflectionClass(Point::class);
// $constructor = $reflect->getConstructor();
// $params = $constructor->getParameters();
// foreach($params as $k=>$param){
//      var_dump($param->getClass());
// }
// exit;

class Circle
{
    /**
     * @var int
     */
    public $radius;//半径

    /**
     * @var Point
     */
    public $center;//圆心点

    const PI = 3.14;

    public function __construct(Point $point, $radius = 1)
    {
        $this->center = $point;
        $this->radius = $radius;
    }
    
    //打印圆点的坐标
    public function printCenter()
    {
        printf('center coordinate is (%d, %d)', $this->center->x, $this->center->y);
    }

    //计算圆形的面积
    public function area()
    {
        return 3.14 * pow($this->radius, 2);
    }
}

function make($className)
{
    $reflectionClass = new ReflectionClass($className);
    $constructor = $reflectionClass->getConstructor();
    $parameters  = $constructor->getParameters();
    $dependencies = getDependencies($parameters);
    var_dump($dependencies);
 
    
    return $reflectionClass->newInstanceArgs($dependencies);
}

//依赖解析
function getDependencies($parameters)
{
    $dependencies = [];
    foreach($parameters as $parameter) {

        $dependency = $parameter->getClass();
        if (is_null($dependency)) {
            if($parameter->isDefaultValueAvailable()) {
                $dependencies[] = $parameter->getDefaultValue();
            } else {
                //不是可选参数的为了简单直接赋值为字符串0
                //针对构造方法的必须参数这个情况
                //laravel是通过service provider注册closure到IocContainer,
                //在closure里可以通过return new Class($param1, $param2)来返回类的实例
                //然后在make时回调这个closure即可解析出对象
                //具体细节我会在另一篇文章里面描述
                $dependencies[] = '0';
            }
        } else {
            //递归解析出依赖类的对象
            $dependencies[] = make($parameter->getClass()->name);
        }
    }



    return $dependencies;
}



$circle = make('Circle');


exit;





class A{



}


/**
 * 测试类
 */
class Website extends  A{


   public $name;
   private $url;
   const TITLE = '中文网';

   public function __construct($name,$url){
       $this->name = $name;
       $this->url = $url;
   }


   public function getName(){
      return $this->name;
   }


   /**
    * 获取url
    *
    * @return void
    */
   private function getUrl(){
      return $this->url;
   }


}



$class = new ReflectionClass('Website');

// $properties = $class->getProperties();
// $methods = $class->getMethods();
// $property = $class->getProperty('url');
// $doc = $class->getDocComment();

// $method_doc = $class->getMethod('getUrl')->getDocComment();

// $wb = $class->newInstance('Jishu','baidu.com');
// $wb->name = 'ssss';


$construct = $class->getConstructor();

$param = $construct->getParameters();


var_dump($param);



