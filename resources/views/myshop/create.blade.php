
@extends('layouts.common')

@section('title', '商品添加')

@section('content')
        <form role="form" action="{{url('save')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>商品名称</label>
                <input class="form-control" type="text" name="goods_name">
            </div>
            <div class="form-group">
                <label>商品价格</label>
                <input class="form-control" type="text" name="goods_price">
          
            </div>
            <div class="form-group">
                <label>商品图片</label>
                <input  type="file" name="goods_pic">
            </div>
        
        
            <button type="submit" class="btn btn-info">提交 </button>

        </form>
 
@endsection


