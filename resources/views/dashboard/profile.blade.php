@extends('components.layout')

@section('title', 'Profile')

@section('content')

    <h2 class="text-xl font-bold mb-4">Profile Account</h2>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                class="w-full p-2 border rounded-md @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                class="w-full p-2 border rounded-md @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-700">New Password (Optional)</label>
            <input type="password" name="password"
                class="w-full p-2 border rounded-md @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded-md">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md font-bold">
            Update Profile
        </button>
    </form>

@endsection