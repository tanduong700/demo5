<h1>{{$title}}</h1>

<div class="container rounded mt-5 bg-white p-md-5">
    <div class="h2 font-weight-bold">Cập nhập quyền</div>
    <div class="table-responsive">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <form action="{{route('permission.update',['id'=>$permissions->id])}}" method="POST">

            <div class="mb-3">
                <label for="">Cập nhập quyền</label>
                <input type="text" class="form-control" name="name" placeholder="tên vai trò..." value="{{$permissions->name}}">
            </div>

            <div class="mb-3">
                <label for="">Cập nhập tên gọi quyền</label>
                <input type="text" class="form-control" name="display_name" placeholder="tên gọi vai trò..." value="{{$permissions->display_name}}">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhập</button>
            <a href="{{route('permission.index')}}" class="btn btn-warning">Quay lại</a>

            @csrf
        </form>
    </div>
</div>