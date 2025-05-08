<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">



    <!-- Main Content Area -->
    <div class="container px-4 py-8 mx-auto max-w-7xl">

        <h1 class="text-3xl font-semibold text-gray-800">Import Users</h1>

        <!-- Import Form -->
        <form action="{{ route('admin.users.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-6">
                <label for="file" class="block text-lg font-semibold">Choose CSV or Excel File</label>
                <input type="file" name="file" id="file" class="p-2 mt-2 border rounded" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Import</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="mt-6 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

</body>

</html>
