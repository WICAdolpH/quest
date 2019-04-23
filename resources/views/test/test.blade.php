<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/test" method="post">
        <label for="name">名字</label>
        <input type="radio" name="text" id="name">
        <label for="sex">性别</label>
        <input type="radio" name="test" id="sex">
        <input type="submit" value="sub">
        {{ csrf_field() }}
    </form>
</body>
</html>