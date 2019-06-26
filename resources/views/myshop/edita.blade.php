
@extends('layouts.common')

@section('title', '学会添加')

@section('content')
        <form role="form" action="{{url('edita_do')}}" method="post">
        <input type="hidden" name="id" value="{{$data->id}}">
            @csrf
            <div class="form-group">
                <label>学生姓名</label>
                <input class="form-control" type="text" name="name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label>学会年龄</label>
                <input class="form-control" type="text" name="age"value="{{$data->age}}">
          
            </div>
            <button type="submit" class="btn btn-info">修改</button>

        </form>
 
@endsection
