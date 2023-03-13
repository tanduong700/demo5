<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="container rounded mt-5 bg-white p-md-5">
    <div class="h2 font-weight-bold">{{$title}}</div>
    <div class="table-responsive">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <form action="{{route('user.store')}}" method="POST">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="tên người dùng ...">
            </div>

            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email người dùng ...">
            </div>

            <div class="mb-3">
                <label for="">password</label>
                <input type="text" class="form-control" name="password" placeholder="Mật khẩu người dùng ...">
            </div>


            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{route('user.index')}}" class="btn btn-warning">Quay lại</a>

            @csrf
        </form>
    </div>
</div>

     </div>
  </div>
</x-app-layout>

