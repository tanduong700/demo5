<form method="POST" action="{{ route('group.store') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="users">Users:</label>
        <select id="users" name="users[]" multiple>
            @foreach ($user as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Create Group</button>
</form>
