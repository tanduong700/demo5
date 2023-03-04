<h1>{{$title}}</h1>

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<button type="button" class="btn btn-info">
<a href="{{ route('dashboard')}}" class="text-black-50">Dashboard</a>
</button>


<div class="container rounded mt-5 bg-white p-md-5">
    <div class="h2 font-weight-bold">Meetings</div>
    <div class="table-responsive">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <form action="{{route('role_permission.update',['id'=>$users->id])}}" method="POST">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="tên người dùng ..."value="{{$users->name}}">
            </div>

            <div class="form-group">
                <label>Roles:</label>
                @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                {{ $users->hasRole($role->name) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $role->display_name }}</label>
                    </div>
                @endforeach
            </div>


        <hr>

        <div class="form-group">
            <label>Permissions:</label>
            @foreach ($permissions as $permission)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            {{ $users->hasPermission($permission->name) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $permission->display_name }}</label>
                </div>
            @endforeach
        </div>


         <button type="submit" class="btn btn-primary">chỉnh sửa</button>
         <a href="{{route('user.index')}}" class="btn btn-warning">Quay lại</a>

          @csrf
        </form>
    </div>
</div>
