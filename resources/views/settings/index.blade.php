<!-- resources/views/settings.blade.php -->
@extends('admin.dashboard')

@section('title', 'Settings')

@section('content')
<div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-md">
    <h1 class="mb-4 text-2xl font-bold">Voting Settings</h1>

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <label class="block mb-2 font-bold">Voting Status:</label>
        <select name="status" class="w-full p-2 border rounded">
            <option value="1" {{ $setting->status == 1 ? 'selected' : '' }}>ON</option>
            <option value="2" {{ $setting->status == 2 ? 'selected' : '' }}>OFF</option>
        </select>
        <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">Update</button>
    </form>
</div>
@endsection
