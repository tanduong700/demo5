<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif


<div class="container rounded mt-5 bg-white p-md-5">
    <div class="h2 font-weight-bold">{{$title}}</div>
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

        </div>
     </div>
</x-app-layout>

