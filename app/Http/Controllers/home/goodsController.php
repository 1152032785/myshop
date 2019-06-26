<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class goodsController extends Controller
{
    //商品列表
    public function goodsList(Request $request)
    {   
        $id=$request->all();
        $data=DB::table('goodss')->get();
        return view('home/goodsList',['data'=>$data]);
    }
}
