<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>event</title>
</head>
<body>
    hello {{ $user->name }}

  vai trò của bạn:
  @foreach ($user->roles as $role)
      <td>{{$role->display_name}}</td>
  @endforeach

  quyền của bạn :
  @foreach ($user->permissions as $permission)
     <td>{{$permission->display_name}}</td>
  @endforeach
</html>
