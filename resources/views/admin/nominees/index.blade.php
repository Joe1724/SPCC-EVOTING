@extends('admin.dashboard')

@section('title', 'Admin - Nominees')

@section('content')
    <h1 class="mb-6 text-3xl font-bold">Nominees</h1>

    <a href="{{ route('admin.nominees.create') }}" class="inline-block px-4 py-2 mb-4 text-white bg-blue-600 rounded hover:bg-blue-700">Add Nominee</a>

    @if (session('success'))
        <div class="p-4 mt-4 text-green-700 bg-green-200 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6">
        <table class="w-full bg-white rounded shadow table-auto">
            <thead class="w-full bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Position</th>
                    <th class="px-4 py-2">Partylist</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nominees as $position => $group)
                    @foreach ($group as $nominee)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $nominee->first_name }} {{ $nominee->last_name }}</td>
                            <td class="px-4 py-2">{{ $position }}</td>
                            <td class="px-4 py-2">{{ $nominee->partylist }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <!-- View Button -->
                                <button onclick="openModal(`{{ $nominee->description }}`)" class="px-2 py-1 text-sm text-white bg-green-500 rounded hover:bg-green-600">
                                    View
                                </button>

                                <!-- Edit Button -->
                                <a href="{{ route('admin.nominees.edit', $nominee->id) }}" class="px-2 py-1 text-sm text-white bg-blue-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.nominees.destroy', $nominee->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this nominee?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-full max-w-md p-6 bg-white rounded shadow-lg">
            <h2 class="mb-4 text-xl font-bold">Nominee Description</h2>
            <p id="modal-description" class="mb-6"></p>
            <button onclick="closeModal()" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                Close
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal(description) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal-description').innerText = description;
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
@endpush
