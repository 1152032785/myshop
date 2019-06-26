
@extends('layouts.common')

@section('title', '商品添加')

@section('content')


<form role="form" action="{{url('update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>商品名称</label>
                <input class="form-control" type="text" name="goods_name" value="{{$res->goods_name}}">
            </div>
            <div class="form-group">
                <label>商品价格</label>
                <input class="form-control" type="text" name="goods_price" value="{{$res->goods_price}}">
          
            </div>
            <div class="form-group">
                <label>商品图片</label>
                <input  type="file" name="goods_pic">
                <img src="{{$res->goods_pic}}" alt="" width="100" height="50">
            </div>
            <input type="hidden" name="id" value="{{$res->id}}">
        
            <button type="submit" class="btn btn-info">修改 </button>

        </form>
@endsection