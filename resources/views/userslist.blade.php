<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hello cac ban</title>
    <link rel="stylesheet" href="">
</head>
<body>
<table>
    <tr>
        <th>User ID</th>
        <th>User name</th>
        <th>created at</th>
        <th>updated at</th>
    </tr>
@foreach($users as $user)
    <tr>
        <th>{{ $user-> id }}</th>
        <th>{{ $user-> fullname }}</th>
        <th>{{ $user-> created_at }}</th>
        <th>{{ $user-> updated_at }}</th>
    </tr>
@endforeach
<table>
</body>
</html>