<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nominee;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NomineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        if (!File::exists(storage_path('app/public/nominees'))) {
            File::makeDirectory(storage_path('app/public/nominees'), 0755, true);
        }

        $nominees = [
            // President Candidates
            [
                'first_name' => 'Maria',
                'last_name' => 'Santos',
                'course' => 'BS Computer Science',
                'position' => 'President',
                'partylist' => 'Unity Party',
                'image' => 'nominees/president_maria.jpg',
                'description' => 'Experienced student leader with a vision for inclusive campus development and academic excellence.',
            ],
            [
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'course' => 'BS Information Technology',
                'position' => 'President',
                'partylist' => 'Progressive Alliance',
                'image' => 'nominees/president_juan.jpg',
                'description' => 'Passionate advocate for student rights and technological innovation in education.',
            ],
            [
                'first_name' => 'Sofia',
                'last_name' => 'Reyes',
                'course' => 'BS Computer Engineering',
                'position' => 'President',
                'partylist' => 'Student First Coalition',
                'image' => 'nominees/president_sofia.jpg',
                'description' => 'Dedicated to bridging the gap between students and administration for better campus life.',
            ],

            // Vice President Candidates
            [
                'first_name' => 'Carlos',
                'last_name' => 'Mendoza',
                'course' => 'BS Information Technology',
                'position' => 'Vice President',
                'partylist' => 'Unity Party',
                'image' => 'nominees/vp_carlos.jpg',
                'description' => 'Committed to supporting student initiatives and fostering a collaborative campus environment.',
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Garcia',
                'course' => 'BS Computer Science',
                'position' => 'Vice President',
                'partylist' => 'Progressive Alliance',
                'image' => 'nominees/vp_ana.jpg',
                'description' => 'Experienced organizer focused on student welfare and academic support programs.',
            ],

            // Secretary Candidates
            [
                'first_name' => 'Miguel',
                'last_name' => 'Torres',
                'course' => 'BS Information Systems',
                'position' => 'Secretary',
                'partylist' => 'Unity Party',
                'image' => 'nominees/sec_miguel.jpg',
                'description' => 'Detail-oriented and organized, committed to transparent communication and documentation.',
            ],
            [
                'first_name' => 'Isabella',
                'last_name' => 'Cruz',
                'course' => 'BS Computer Science',
                'position' => 'Secretary',
                'partylist' => 'Student First Coalition',
                'image' => 'nominees/sec_isabella.jpg',
                'description' => 'Efficient communicator dedicated to keeping students informed and engaged.',
            ],

            // Treasurer Candidates
            [
                'first_name' => 'Rafael',
                'last_name' => 'Aquino',
                'course' => 'BS Information Technology',
                'position' => 'Treasurer',
                'partylist' => 'Progressive Alliance',
                'image' => 'nominees/treas_rafael.jpg',
                'description' => 'Financially responsible with experience in budget management and fiscal transparency.',
            ],
            [
                'first_name' => 'Gabriela',
                'last_name' => 'Ramos',
                'course' => 'BS Computer Engineering',
                'position' => 'Treasurer',
                'partylist' => 'Unity Party',
                'image' => 'nominees/treas_gabriela.jpg',
                'description' => 'Trustworthy and meticulous in handling student funds and financial planning.',
            ],

            // Auditor Candidates
            [
                'first_name' => 'Diego',
                'last_name' => 'Fernandez',
                'course' => 'BS Computer Science',
                'position' => 'Auditor',
                'partylist' => 'Student First Coalition',
                'image' => 'nominees/aud_diego.jpg',
                'description' => 'Committed to accountability and ensuring proper use of student organization resources.',
            ],
            [
                'first_name' => 'Lucia',
                'last_name' => 'Morales',
                'course' => 'BS Information Systems',
                'position' => 'Auditor',
                'partylist' => 'Progressive Alliance',
                'image' => 'nominees/aud_lucia.jpg',
                'description' => 'Analytical and thorough in reviewing financial records and organizational processes.',
            ],

            // Public Relations Officer Candidates
            [
                'first_name' => 'Antonio',
                'last_name' => 'Villanueva',
                'course' => 'BS Information Technology',
                'position' => 'Public Relations Officer',
                'partylist' => 'Unity Party',
                'image' => 'nominees/pro_antonio.jpg',
                'description' => 'Creative communicator skilled in social media and public engagement strategies.',
            ],
            [
                'first_name' => 'Carmen',
                'last_name' => 'Santiago',
                'course' => 'BS Computer Science',
                'position' => 'Public Relations Officer',
                'partylist' => 'Student First Coalition',
                'image' => 'nominees/pro_carmen.jpg',
                'description' => 'Energetic and personable, dedicated to promoting student activities and achievements.',
            ],
        ];

        // Download and save placeholder images
        foreach ($nominees as $index => $nomineeData) {
            // Generate a unique seed for consistent images
            $seed = md5($nomineeData['first_name'] . $nomineeData['last_name']);
            
            // Use UI Avatars service for placeholder images
            $gender = in_array($nomineeData['first_name'], ['Maria', 'Sofia', 'Ana', 'Isabella', 'Gabriela', 'Lucia', 'Carmen']) ? 'female' : 'male';
            $imageUrl = "https://ui-avatars.com/api/?name=" . urlencode($nomineeData['first_name'] . '+' . $nomineeData['last_name']) . "&size=400&background=2563eb&color=fff&bold=true";
            
            try {
                // Download image
                $imageContent = @file_get_contents($imageUrl);
                
                if ($imageContent !== false) {
                    // Save to storage
                    Storage::disk('public')->put($nomineeData['image'], $imageContent);
                    echo "✓ Downloaded image for {$nomineeData['first_name']} {$nomineeData['last_name']}\n";
                } else {
                    echo "✗ Failed to download image for {$nomineeData['first_name']} {$nomineeData['last_name']}\n";
                    $nomineeData['image'] = null;
                }
            } catch (\Exception $e) {
                echo "✗ Error downloading image: " . $e->getMessage() . "\n";
                $nomineeData['image'] = null;
            }

            // Create nominee
            Nominee::create($nomineeData);
        }

        echo "\n✓ Successfully seeded " . count($nominees) . " nominees!\n";
    }
}
