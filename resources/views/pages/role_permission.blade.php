<h1>{{$title}}</h1>

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<button type="button" class="btn btn-info">
<a href="{{ url('/dashboard') }}" class="text-black-50">Dashboard</a>
</button>


<div class="container rounded mt-5 bg-white p-md-5">
    <div class="h2 font-weight-bold">Meetings</div>
    <div class="table-responsive">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <form action="{{route('role_permission.edit',['id'=>$users->id])}}" method="POST">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="tên người dùng ..."value="{{$users->name}}">
            </div>

           <div class="form-group">
            <label for="roles[]">ROLE</label>
            @forelse ($roles as $item)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="display_name"  value="{{$item->id}}" >
                <label class="form-check-label" >{{$item->display_name}}</label>

            </div>
            @empty

            @endforelse
            </div>
         </select>

        <hr>

         <div class="form-group">
            <label for="">PERMISSIONS</label>
            @forelse ( $permissions as $items)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="display_name" value="{{$items->id}}" >
                <label class="form-check-label" for="flexCheckDefault">{{$items->display_name}}</label>
            </div>
            @empty

            @endforelse
         </div>

         <button type="submit" class="btn btn-primary">chỉnh sửa</button>
         <a href="{{route('user.index')}}" class="btn btn-warning">Quay lại</a>

          @csrf
        </form>
    </div>
</div>
