<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Voting Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="title">Voting Information</div>

    <div class="section">
        <strong>Status: </strong>{{ $status }}
    </div>

    <div class="section">
        <strong>Total Voters: </strong>{{ $totalVoters }}
    </div>

    <div class="section">
        <strong>Voted: </strong>{{ $voted }}
    </div>

    <div class="section">
        <strong>Not Voted: </strong>{{ $notVoted }}
    </div>

    <div class="section">
        <strong>Results: </strong>
        <table class="table">
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Nominee</th>
                    <th>Partylist</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result->nominee->position }}</td>
                        <td>{{ $result->nominee->first_name }} {{ $result->nominee->last_name }}</td>
                        <td>{{ $result->nominee->partylist }}</td>
                        <td>{{ $result->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
