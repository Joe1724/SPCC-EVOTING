<?php

namespace Database\Seeders;

use App\Models\Election;
use App\Models\Partylist;
use App\Models\Position;
use App\Models\Nominee;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create default setting
        Setting::firstOrCreate(['id' => 1], ['status' => 0]);
        
        // Call seeders
        $this->call([
            AdminSeeder::class,
            NomineeSeeder::class,
        ]);
    }
}
