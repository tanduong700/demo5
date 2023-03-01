<h1>{{$title}}</h1>

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<button type="button" class="btn btn-info">
<a href="{{ route('dashboard') }}" class="text-black-50">Dashboard</a>
</button>
@role('admin')
<button type="button" class="btn btn-info">
    <a href="{{ route('role.index') }}" class="text-black-50">role</a>
</button>

<button type="button" class="btn btn-info">
    <a href="{{ route('permission.index') }}" class="text-black-50">permission</a>
</button>

<button type="button" class="btn btn-info">
    <a href="{{ route('role_permission.index') }}" class="text-black-50">role & permission</a>
</button>
@endrole

<div class="container rounded mt-5 bg-white p-md-5">
    <div class="h2 font-weight-bold">Meetings</div>
    <div class="table-responsive">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">stt</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">creat_at</th>
                    <th scope="col">up_at</th>
                    <th scope="col">Status</th>
                    @role('admin')
                    <p>admin</p>
                    <a href="{{route('user.create')}}" class="btn btn-primary">Thêm</a>
                    @endrole
                </tr>
            </thead>
            <tbody>

                 @forelse ( $users as $key => $item)
                 <tr class="bg-blue">
                    <td class="pt-3">{{$key+1}}</td>
                    <td class="pt-3">
                        <a href="{{route('role_permission.edit',['id' => $item->id])}}" class="btn btn-link">{{$item->name}}</a>
                    </td>
                    <td class="pt-3 mt-1">{{$item->email}}</td>
                    <td class="pt-3">{{$item->created_at}}</td>
                    <td class="pt-3">{{$item->updated_at}}</td>
                    @role('admin')
                    <td>
                        <a href="{{route('user.edit', ['id' => $item->id])}}" class="btn btn-warning">sửa</a>
                    </td>
                    <td>
                        <a href="{{route('user.delete', ['id' => $item->id])}}" class="btn btn-danger">xóa</a>
                    </td>
                    @endrole
                </tr>

                 @empty

                 <tr>
                    <td colspan="s">không có người dùng</td>
                </tr>
                 @endforelse

            </tbody>
        </table>
    </div>
</div>
