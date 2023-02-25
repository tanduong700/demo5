<h1>{{$title}}</h1>

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif
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
                    <th scope="col">Status</th>
                    @role('admin')
                    <p>admin</p>
                    <a href="{{route('user.create')}}" class="btn btn-primary">Thêm</a>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @if (!empty($users))
                 @foreach ($users as $key => $item)
                <tr class="bg-blue">
                    <td class="pt-3">{{$key+1}}</td>
                    <td class="pt-3">{{$item->name}}</td>
                    <td class="pt-3 mt-1">{{$item->email}}</td>
                    <td class="pt-3">{{$item->email_verified_at}}</td>
                    @role('admin')
                    <td>
                        <a href="{{route('user.edit', ['id' => $item->id])}}" class="btn btn-warning">sửa</a>
                    </td>
                    <td>
                        <a href="{{route('user.delete', ['id' => $item->id])}}" class="btn btn-danger">xóa</a>
                    </td>
                    @endrole

                </tr>
                 @endforeach
                @else
                <tr>
                    <td colspan="4">không có người dùng</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
