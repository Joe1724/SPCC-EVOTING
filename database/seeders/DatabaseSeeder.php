<?php

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
    Setting::firstOrCreate(['id' => 1], ['status' => 0]);
}

}
