
@extends('layouts.common')

@section('title', '学会添加')

@section('content')
        <form role="form" action="{{url('addcreate_do')}}" method="post">
            @csrf
            <div class="form-group">
                <label>学生姓名</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label>学会年龄</label>
                <input class="form-control" type="text" name="age">
          
            </div>
            <button type="submit" class="btn btn-info">提交 </button>

        </form>
 
@endsection
