@props(['user'])

<div class="card">
    <img src="https://avatar-placeholder.iran.liara.run/avatars/{{$user->id}}?name={{ urlencode($user->specialName) }}" alt="User Image">
    <h2>{{ $user->specialName }}</h2>
    <p>{{ $user->is_admin ? 'Admin' : 'Regular User' }}</p>
    <p>{{ $user->bio }}</p>
    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
