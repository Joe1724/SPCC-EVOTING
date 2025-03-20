<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Voting Settings</h1>

        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <label class="block mb-2 font-bold">Voting Status:</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="1" {{ $setting->status == 1 ? 'selected' : '' }}>ON</option>
                <option value="0" {{ $setting->status == 0 ? 'selected' : '' }}>OFF</option>
            </select>
            <button type="submit" class="px-4 py-2 mt-4 text-white bg-green-500 rounded">Update</button>
        </form>
    </div>

</body>
</html>
