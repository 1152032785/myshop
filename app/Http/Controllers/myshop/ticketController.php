<?php

namespace App\Http\Controllers\myshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ticketController extends Controller
{
    //火车票显示
    public function ticket_add()
    {
        return view('myshop/ticket_add');
    }

    //添加入库
    public function ticket_add_do(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $path = $request->file('pic')->store('');
        // dd($path);
        $pic=asset('storage'.'/'.$path);
        // dd($img);
        $res=DB::table('plan')->insert([
           'source'=>$data['source'],
           'place'=>$data['place'],
           'ofplace'=>$data['ofplace'],
           'price'=>$data['price'],
           'pic'=>$pic,
           'num'=>$data['num'],
           'time'=>strtotime($data['time']),
           'oftime'=>strtotime($data['oftime']),
        ]);
        if($res){
            return redirect('ticket_list');
        }
    }

    
}
