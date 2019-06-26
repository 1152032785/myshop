<?php
namespace App\Http\Tools;
class Tools
{
    public  $redis;
    public function getRedis()
    {
        $redis=new \Redis();  //new一个对象
        $redis->connect('127.0.0.1','6379');
        return $redis;
    }
}
?>