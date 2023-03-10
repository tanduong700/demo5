<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
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
                    <th scope="col">display_name</th>
                    <th scope="col">created_at</th>
                    <th scope="col">updated_at</th>
                    <th scope="col">status</th>

                    <a href="{{route('role.create')}}" class="btn btn-primary">Thêm</a>

                </tr>
            </thead>
            <tbody>

                 @forelse ( $roles as $key => $item)
                 <tr class="bg-blue">
                    <td class="pt-3">{{$key+1}}</td>
                    <td class="pt-3">{{$item->name}}</td>
                    <td class="pt-3 mt-1">{{$item->display_name}}</td>
                    <td class="pt-3">{{$item->created_at}}</td>
                    <td class="pt-3">{{$item->updated_at}}</td>

                    <td>
                        <a href="{{route('role.edit', ['id' => $item->id])}}" class="btn btn-warning">sửa</a>
                    </td>
                    <td>
                        <a href="{{route('role.delete', ['id' => $item->id])}}" class="btn btn-danger">xóa</a>
                    </td>

                </tr>

                 @empty

                 <tr>
                    <td colspan="s">không có vai trò</td>
                </tr>
                 @endforelse

            </tbody>
        </table>
    </div>
</div>

         </div>
      </div>
</x-app-layout>
