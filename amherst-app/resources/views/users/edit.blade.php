@extends('layouts.app')

@section('content')
<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <img src="https://avatar-placeholder.iran.liara.run/avatars/{{$user->id}}?name={{ urlencode($user->specialName) }}" alt="User Image">
    <input type="text" name="name" value="{{ $user->name }}" required>
    <input type="email" name="email" value="{{ $user->email }}" required>
    <textarea name="bio">{{ $user->bio }}</textarea>
    <input type="checkbox" name="is_admin" {{ $user->is_admin ? 'checked' : '' }}> Is Admin
    <button type="submit">Submit</button>
    <a href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection
