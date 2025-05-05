<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index === 0) continue;

            try {
                User::create([
                    'name'       => $row[0],
                    'student_id' => $row[1],
                    'email'      => $row[2],
                    'password'   => bcrypt($row[3]),
                    'role'       => $row[4],
                ]);
            } catch (\Exception $e) {
                Log::error("Import error on row {$index}: " . $e->getMessage());
            }
        }
    }
}
