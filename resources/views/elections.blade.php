<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-5xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Election Management</h1>
            <button onclick="openModal('addElectionModal')" class="px-4 py-2 text-white bg-blue-500 rounded">Add Election</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 border">Election Name</th>
                        <th class="p-3 border">Start Date</th>
                        <th class="p-3 border">End Date</th>
                        <th class="p-3 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($elections as $election)
                        <tr class="hover:bg-gray-100">
                            <td class="p-3 border">{{ $election->name }}</td>
                            <td class="p-3 border">{{ $election->start ?? '—' }}</td>
                            <td class="p-3 border">{{ $election->end ?? '—' }}</td>
                            <td class="p-3 text-center border">
                                @if ($election->status == 1)
                                    <button onclick="openModal('startElectionModal', '{{ $election->id }}')" class="px-3 py-1 text-white bg-green-500 rounded">Start</button>
                                @elseif ($election->status == 2)
                                    <button onclick="openModal('stopElectionModal', '{{ $election->id }}')" class="px-3 py-1 text-white bg-yellow-500 rounded">Stop</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Election Modal -->
    <div id="addElectionModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="w-1/3 p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-lg font-bold">Add Election</h2>
            <form method="POST" action="{{ route('elections.add') }}">
                @csrf
                <input type="text" name="name" placeholder="Election Name" class="w-full p-2 mb-4 border rounded">
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('addElectionModal')" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Election Modal -->
    <div id="startElectionModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="w-1/3 p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-lg font-bold">Start Election</h2>
            <form method="POST" action="{{ route('elections.start') }}">
                @csrf
                <input type="hidden" name="election_id" id="startElectionId">
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('startElectionModal')" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded">Start</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Stop Election Modal -->
    <div id="stopElectionModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="w-1/3 p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-lg font-bold">Stop Election</h2>
            <form method="POST" action="{{ route('elections.stop') }}">
                @csrf
                <input type="hidden" name="election_id" id="stopElectionId">
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('stopElectionModal')" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-white bg-yellow-500 rounded">Stop</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId, electionId = null) {
            document.getElementById(modalId).classList.remove('hidden');
            if (electionId) {
                if (modalId === 'startElectionModal') {
                    document.getElementById('startElectionId').value = electionId;
                } else if (modalId === 'stopElectionModal') {
                    document.getElementById('stopElectionId').value = electionId;
                }
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</body>
</html>
