<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Nominee;
use Database\Seeders\NomineeSeeder;
use Database\Seeders\NomineeSeederWithRealPhotos;

class SeedNominees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nominees:seed {--real-photos : Use realistic photos from randomuser.me} {--fresh : Clear existing nominees first}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database with nominee data and images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🗳️  SPCC eVoting - Nominee Seeder');
        $this->newLine();

        // Check if we should clear existing nominees
        if ($this->option('fresh')) {
            if ($this->confirm('This will delete all existing nominees. Continue?', false)) {
                $count = Nominee::count();
                Nominee::truncate();
                $this->info("✓ Deleted {$count} existing nominees");
                $this->newLine();
            } else {
                $this->warn('Seeding cancelled.');
                return 0;
            }
        }

        // Choose seeder based on option
        $useRealPhotos = $this->option('real-photos');
        
        if ($useRealPhotos) {
            $this->info('Using realistic photos from randomuser.me API...');
            $seeder = new NomineeSeederWithRealPhotos();
        } else {
            $this->info('Using UI Avatars for profile images...');
            $seeder = new NomineeSeeder();
        }

        $this->newLine();
        
        // Run the seeder
        $seeder->run();
        
        $this->newLine();
        $this->info('✓ Nominee seeding completed!');
        
        // Show summary
        $total = Nominee::count();
        $positions = Nominee::distinct('position')->pluck('position');
        
        $this->newLine();
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Nominees', $total],
                ['Positions', $positions->count()],
                ['Party Lists', Nominee::distinct('partylist')->count()],
            ]
        );

        $this->newLine();
        $this->info('💡 Tip: Run "php artisan storage:link" if images are not showing');
        
        return 0;
    }
}
