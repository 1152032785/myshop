<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\User;

class Login extends Controller
{
     //注册
     public function register()
     {
         return view('home/register');
     }
 
     //注册执行页面
     public function do_register(Request $request)
     {
         $data=$request->all();
         // dd($data);
         $res=User::insert([
             'name'=>$data['name'],
             'pwd'=>$data['pwd'],
         ]);
         // dd($res);
         if($res){
             return redirect()->action('home\Login@login');
         }
     }
 
     //登录页面
     public function login()
     {
         return view('home/login');
         
     }
 
     //登录执行页面
     public function do_login(Request $request)
     {
         $data=$request->all();
        //  dd($data);
         $res=User::where('name','=',$data['name'])->first();
         // dd($res);
         if($res){
             if($res->pwd == $data['pwd']){
                 session([
                    'id'=>$res['id'],
                    'name'=>$res['name'],
                 ]);
                 echo "<script>alert('登录成功')</script>";
                 echo "<script>window.location.href='home_index'</script>";
             }else{
                 echo "<script>alert('密码不正确')</script>";
                 echo "<script>window.location.href='home_login'</script>";
             }
         }else{
             echo "<script>alert('账号不存在')</script>";
             echo "<script>window.location.href='home_login'</script>";
         }
     }
 
     
 
     public function logout(Request $request)
     {
         $request->session()->flush();
         return redirect()->action('home\Login@login');
         
     }
}
