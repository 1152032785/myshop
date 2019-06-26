<?php

namespace App\Http\Controllers\myshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\User;

class LoginController extends Controller
{
    //注册
    public function register()
    {
        return view('myshop/register');
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
            return redirect()->action('myshop\LoginController@login');
        }
    }

    //登录页面
    public function login()
    {
        return view('myshop/login');
        
    }

    //登录执行页面
    public function do_login(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $res=User::where('name','=',$data['name'])->first();
        // dd($res);
        if($res){
            if($res->pwd == $data['pwd']){
                session(['name'=>$data['name']]);
                echo "<script>alert('登录成功')</script>";
                echo "<script>window.location.href='create'</script>";
            }else{
                echo "<script>alert('密码不正确')</script>";
                echo "<script>window.location.href='login'</script>";
            }
        }else{
            echo "<script>alert('账号不存在')</script>";
            echo "<script>window.location.href='login'</script>";
        }
    }

    

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->action('myshop\LoginController@login');
        
    }
}
