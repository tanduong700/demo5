<h1>Create Group</h1>

<form action="{{route('role.store')}}" method="POST">
    <div>
        <label for="name">Group Name:</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="users">Users:</label>
        <select name="users[]" multiple>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Create Group</button>
    </div>
    @csrf
</form>
