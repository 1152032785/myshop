
@extends('layouts.common')

@section('title', '学生添加')

@section('content')
<form action="">
    <input type="text" name="sou">
    <input type="submit" value="搜索">
</form>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <td>学省名称</td>
                <td>学生年龄</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $v)
                <tr> 
                    <td>{{$v->name}}</td>
                    <td>{{$v->age}}</td>
                    <td>
                        <a href="{{url('del')}}?id={{$v->id}}">删除</a> |
                        <a href="{{url('edita')}}?id={{$v->id}}">修改</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{$data->appends(['sou' => $sou])->links()}}
@endsection