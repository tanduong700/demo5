<h1>Create Group</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<form action="{{route('group.store')}}" method="POST">
    <div class="form-group">
        <label for="name">Group Name:</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="users">Users:</label>
        <select name="users[]" multiple class="form-control">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create Group</button>
    </div>
    @csrf
</form>
