@extends('layouts.home')

@section('title', '商品登录')

@section('content')
<table>
   <tr>
      <td>#</td>
      <td>车次</td>
      <td>出发地</td>
      <td>到达地</td>
      <td>价钱</td>
      <td>图片</td>
      <td>张数</td>
      <td>操作</td>
   </tr>
   @foreach($data as $v)
   <tr>
      <td>{{$v->id}}</td>
      <td>{{$v->source}}</td>
      <td>{{$v->place}}</td>
      <td>{{$v->ofplace}}</td>
      <td>{{$v->price}}</td>
      <td>
          <img src="{{$v->pic}}" alt="" width='70' height="70">  
      </td>
      <td>{{$v->num}}</td>
      <td>
           <a href="{{url('ticket_del')}}?id={{$v->id}}">删除</a>
				&nbsp;||&nbsp;
			  <a href="{{url('ticket_upd')}}?id={{$v->id}}">修改</a>
      </td>
   </tr>
   @endforeach
</table>
@endsection