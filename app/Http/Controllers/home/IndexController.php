<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Goodss;
use DB;

class IndexController extends Controller
{

    public function index(Request $request)
    {
         // $num=$this->redis->incr('num');
        // print_r($num);
        // $data=Goodss::orderBy('id','desc')->get()->toArray();
        $res=$request->all();
        if(isset($res['find_name'])){
            $data=Goodss::where('goods_name','like','%'.$res['find_name'].'%')->paginate(2);
        }else{
            $res['find_name']='';
            $data=Goodss::paginate(4);
        }
        // dd($data);
        return view('home/index',['data'=>$data],['name'=>$res['find_name']]);
    }

    public function wish(Request $request)
    {
        $id=$request->all();
        // dd($data);
        $res=Goodss::where('id',$id)->first();
        // dd($res);
        return view('home/wishlist',['res'=>$res]);
    }

    public function buyCart(Request $request)
    {
        $id=$request->all();
        // dd($id);     
        $uid=session('id');
        // dd($uid);
        $data=DB::table('goodss')->where('id',$id)->first();
        // dd($data);
        // $info = json_decode($data, true);
        $res=DB::table('cart')->where('id',$id)->insert([
            'uid'=>$uid,
            'goods_name'=>$data->goods_name,
            'goods_id'=>$data->id,
            'goods_pic'=>$data->goods_pic,
            'goods_price'=>$data->goods_price,
            'add_time'=>time()
        ]);
       
        if($res){
            return redirect()->action('home\IndexController@do_buyCart');
        }
    }

    public function do_buyCart(Request $request)
    {
        $uid=session('id');
        // dd($uid);
        $data=DB::table('cart')->where('uid',$uid)->get();
        // dd($data);
        $price=DB::table('cart')->where('uid',$uid)->select('goods_price')->get();
        // dd($price);
        $total=0;
        foreach($price as $k=>$v){
            // var_dump($v);
            // $prices=$v;
            // $total=array_sum($v);
            $total += $v->goods_price;
        }
        // $total=array_sum($prices);
        // dd($prices);
        // dd($total);
        return view('home/buyCart',['data'=>$data],['total'=>$total]);
        
    }

    public function order(Request $request)
    {
        //接受购物车穿过来的id
        $id=$request->get('id');
        // dd($id);
        //去除点右边拼接的，
        $id=trim($id,',');
        // dd($id);
        //接受用户id
        $uid=session('id');
        // dd($uid);
        //生成订到号
        $oid=time().rand(1000,4000).$uid;
        // dd($oid);
        //查询单价
        $price=DB::table('cart')->where('uid',$uid)->select('goods_price')->get();
        // dd($price);
        $pay_money=0;
        //循环遍历出来单价相加 求出总价
        foreach($price as $k=>$v){
            // var_dump($v);
            // $prices=$v;
            // $total=array_sum($v);
            $pay_money += $v->goods_price;
        }
        // dd($pay_money);
        //入库 order
        $res=DB::table('order')->insert([
            'oid'=>$oid,
            'uid'=>$uid,
            'pay_money'=>$pay_money,
            'add_time'=>time()
        ]);
        //根据商品id查询商品信息
        $id=explode(',',$id); //因为whereIn里面的参数必须是数组
        // dd($id);
        $data=DB::table('goodss')->whereIn('id',$id)->get();
        // dd($data);
        //因为查询出来的是二维数组，需要循环遍历出来
        $info=[];
        foreach($data as $v){
            $info[]=[
                'oid'=>$oid,
                'goods_id'=>$v->id,
                'goods_name'=>$v->goods_name,
                'goods_pic'=>$v->goods_pic,
                'goods_price'=>$v->goods_price,
                'add_time'=>time()
            ];
        }
        $result=DB::table('order_detail')->insert($info);
        if($result){
            return redirect()->action('home\IndexController@do_order',['oid'=>$oid]);
        }
    }

    public function do_order(Request $request)
    {
        $oid=$request->get('oid'); //一个值用get get接值必须要有参数 如果用all接受是数组的形式
        // dd($oid);
        $res=DB::table('order_detail')->where('oid',$oid)->get();
        // dd($res);
        return view('home/order',['res'=>$res]);
    }

    //后台火车票删除
    public function ticket_del(Request $request)
    {
        $id = $request->all();
        // dd($id);
        $res=DB::table('plan')->delete($id);
        if($res){
            return redirect('ticket_list');
        }
    }
    //后台火车票列表展示
    public function ticket_list(Request $request)
    {    
            // echo 111;
            $res = $request->all();
            $data = DB::table('plan')->get();
            // dd($data);
            return view('home.ticket_list',['data'=>$data]);
    }

    //后台火车票修改表单显示
    public function ticket_upd(Request $request)
    {    
        $id=$request->all();
        // dd($id);
        $data=DB::table('plan')->where('id',$id)->first();
        // dd($data);
        return view('home.ticket_upd',['data'=>$data]);
    }
    //后台火车票修改执行
    public function ticket_upd_do(Request $request)
    {
        $data=$request->all();
        $res=DB::table('plan')->where('id',$data['id'])->update([
           'source'=>$data['source'],
           'place'=>$data['place'],
           'ofplace'=>$data['ofplace'],
           'price'=>$data['price'],
        ]);
        if($res){
            return redirect('ticket_list');
        }
    }
    
}
