<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show_add</title>
</head>
<body>

<form action="/admin/resource" method="post">

    @csrf
    <div> 用户名：<input type="text" name="username" value=""> </div>
    <div> 别名：<input type="text" name="alias" value=""> </div>
    <div>性别：<input type="radio" name="sex"  value="4" checked>保密
    <input type="radio" name="sex"  value="1">男
    <input type="radio" name="sex"  value="2">女</div> 
    <div>兴趣：
     <input type="checkbox" name="interest[]" value="篮球" />篮球
     <input type="checkbox" name="interest[]" value="足球" />足球
     <input type="checkbox" name="interest[]" value="羽毛球" />羽毛球
     <input type="checkbox" name="interest[]" value="游泳" />游泳

    </div>
    <input type="submit" name="submit" value="提交">
</form>
    
<div style="border:1px solid red">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
</body>
</html>