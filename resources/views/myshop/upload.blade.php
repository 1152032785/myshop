
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文件上传</title>
</head>
<body>
    <form action="{{url('do_upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="img" />
        <button type="submit">上传</button>
    </form>
</body>
</html>