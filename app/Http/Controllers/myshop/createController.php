<?php

namespace App\Http\Controllers\myshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class createController extends Controller
{
    public function addcreate()
    {
    	return view('myshop/addcreate');
    }

    public function addcreate_do(Request $request)
    {
        $data = $request->all();
        $res = DB::table('students')->insert([
            'name'=>$data['name'],
            'age'=>$data['age'],
        ]);
        if($res){
            return redirect('list');
        }
    }
   //展示
      public function list(Request $request)
    {
        $res = $request->all();
        if(isset($res['sou'])){
            $data = DB::table('students')->where('name','like','%'.$res['sou'].'%')->paginate(2);
        }else{
            $res['sou'] = '';
            $data = DB::table('students')->paginate(2);
        }

        return view('myshop.list',['data'=>$data],['sou'=>$res['sou']]);
    }
    //删除
    public function del(Request $request)
    {
        $id = $request->all();
        DB::table('students')->delete($id);
        return redirect('list');
    }

    //修改
    public function edita(Request $request)
    {
        $id = $request->all();
        $data = DB::table('students')->where('id',$id)->first();
        return view('myshop/edita',['data'=>$data]);
    }

    //修改执行
    public function edita_do(Request $request)
    {
        $data = $request->all();
        $res = DB::table('students')->where('id',$data['id'])->update([
            'name'=>$data['name'],
            'age'=>$data['age'],
        ]);
        return redirect('list');
    }
}
