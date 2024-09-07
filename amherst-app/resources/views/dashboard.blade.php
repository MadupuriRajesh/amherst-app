@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center items-center mb-8">
        <h1 class="text-3xl font-bold text-center">User Dashboard</h1>
    </div>
    <a href="{{ route('users.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        Create User
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Role</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Bio</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->specialName }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $user->is_admin ? 'Admin' : 'User' }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->bio }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 flex items-center">
                                <x-icon-edit class="w-5 h-5 mr-1" /> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2 flex items-center">
                                    <x-icon-trash class="w-5 h-5 mr-1" /> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection
