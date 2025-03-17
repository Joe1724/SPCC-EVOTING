<?php

use App\Models\Election;
use App\Models\Partylist;
use App\Models\Position;
use App\Models\Nominee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $election = Election::create(['name' => 'Student Council Election', 'start' => now(), 'end' => now()->addDays(7)]);

        $position = Position::create(['name' => 'President', 'election_id' => $election->id]);

        $partylist = Partylist::create(['name' => 'Party A', 'election_id' => $election->id]);

        Nominee::create(['name' => 'Nominee 1', 'position_id' => $position->id, 'partylist_id' => $partylist->id, 'election_id' => $election->id]);
    }
}
