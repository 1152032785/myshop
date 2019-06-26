
@extends('layouts.common')

@section('title', '学会添加')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('ticket_upd_do')}}" method="post">
    <input type="hidden" name="id" value="{{$data->id}}">
    @csrf
        <table>
            <tr>
               <td>车次</td>
               <td><input type="text" name="source" value="{{$data->source}}"></td>
            </tr>
            <tr>
               <td>出发地</td>
               <td><input type="text" name="place" value="{{$data->place}}"></td>
            </tr>
            <tr>
               <td>到达地</td>
               <td><input type="text" name="ofplace" value="{{$data->ofplace}}"></td>
            </tr>
            <tr>
               <td>价钱</td>
               <td><input type="text" name="price" value="{{$data->price}}"></td>
            </tr>
            <!-- <tr>
               <td>图片</td>
               <td><input type="file" name="pic"></td>
            </tr> -->
            <tr>
               <td>张数</td>
               <td><input type="text" name="num" value="{{$data->num}}"></td>
            </tr>
            <tr>
               <td></td>
               <td><input type="submit" value="修改"></td>
            </tr>
        </table>
    </form>
</body>
</html>
 
@endsection