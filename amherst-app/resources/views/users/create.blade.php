@extends('layouts.app')

@section('content')
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <textarea name="bio" placeholder="Bio"></textarea>
    <input type="checkbox" name="is_admin"> Is Admin
    <button type="submit">Submit</button>
    <a href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection
