<?php

namespace App\Http\Controllers\myshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\model\Shop;
use App\model\Goodss;
use DB;
// use App\Http\Tools\Tools; 

class IndexController extends Controller
{
    public $redis;
    public function __construct()
    {
        $this->redis=new \Redis();
        $this->redis->connect('127.0.0.1','6379');
    }
    //添加
    public function create()
    {
        return view('myshop/create');
    }
    
    //执行添加
    public function save(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $path = $request->file('goods_pic')->store('');
        $img=asset('storage'.'/'.$path);
        // dd($path);
        // dd($img);
        $res=Goodss::insert([
            'goods_name'=>$data['goods_name'],
            'goods_price'=>$data['goods_price'],
            'goods_pic'=>$img,
            'add_time'=>time()
        ]);
        if($res){
            return redirect()->action('myshop\IndexController@index');
        }
    }

    //列表
    public function index(Request $request)
    {
        // $num=$this->redis->incr('num');
        // print_r($num);
        // $data=Goodss::orderBy('id','desc')->get()->toArray();
        $res=$request->all();
        if(isset($res['find_name'])){
            $data=Goodss::where('goods_name','like','%'.$res['find_name'].'%')->paginate(3);
        }else{
            $res['find_name']='';
            $data=Goodss::paginate(3);
        }
        // dd($data);
        return view('myshop/index',['data'=>$data],['name'=>$res['find_name']]);
    }

    //删除
    public function delete(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $res=Goodss::where(['id'=>$data['id']])->delete();
        if($res){
            return redirect()->action('myshop\IndexController@index');
        }
    }  
    
    //修改
    public function edit(Request $request)
    {
        $data=$request->all();
        $res=Goodss::where(['id'=>$data['id']])->first();       
        return view('myshop/edit',['res'=>$res]);
    }

    //执行修改
    public function update(Request $request)
    {
        $data=$request->all(); 
        $path=$request->file('goods_pic');
        // dd($path);
        if($path){
            $path = $request->file('goods_pic')->store('');
            $img=asset('storage'.'/'.$path);
            // dd($path);
            $res=Goodss::where(['id'=>$data['id']])->update([
                'goods_name'=>$data['goods_name'],
                'goods_price'=>$data['goods_price'],
                'goods_pic'=>$img,
            ]);
        }else{
            $res=Goodss::where(['id'=>$data['id']])->update([
                'goods_name'=>$data['goods_name'],
                'goods_price'=>$data['goods_price'],
               
            ]);
        }
        if($res){
            return redirect()->action('myshop\IndexController@index');
        }
    }
}
