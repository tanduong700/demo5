<h1>{{$title}}</h1>

<div class="container rounded mt-5 bg-white p-md-5">
    <div class="h2 font-weight-bold">Thêm vai trò</div>
    <div class="table-responsive">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <form action="{{route('role.store')}}" method="POST">
            <div class="mb-3">
                <label for="">vai trò</label>
                <input type="text" class="form-control" name="name" placeholder="tên vai trò...">
            </div>

            <div class="mb-3">
                <label for="">Tên gọi vai trò</label>
                <input type="text" class="form-control" name="display_name" placeholder="tên gọi vai trò...">
            </div>

            <button type="submit" class="btn btn-primary">Thêm vai trò</button>
            <a href="{{route('role.index')}}" class="btn btn-warning">Quay lại</a>

            @csrf
        </form>
    </div>
</div>
