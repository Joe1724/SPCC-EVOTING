<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nominee;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NomineeSeederWithRealPhotos extends Seeder
{
    /**
     * Run the database seeds.
     * This version uses randomuser.me API for realistic profile photos
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
                'gender' => 'female',
                'description' => 'Experienced student leader with a vision for inclusive campus development and academic excellence.',
            ],
            [
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'course' => 'BS Information Technology',
                'position' => 'President',
                'partylist' => 'Progressive Alliance',
                'gender' => 'male',
                'description' => 'Passionate advocate for student rights and technological innovation in education.',
            ],
            [
                'first_name' => 'Sofia',
                'last_name' => 'Reyes',
                'course' => 'BS Computer Engineering',
                'position' => 'President',
                'partylist' => 'Student First Coalition',
                'gender' => 'female',
                'description' => 'Dedicated to bridging the gap between students and administration for better campus life.',
            ],

            // Vice President Candidates
            [
                'first_name' => 'Carlos',
                'last_name' => 'Mendoza',
                'course' => 'BS Information Technology',
                'position' => 'Vice President',
                'partylist' => 'Unity Party',
                'gender' => 'male',
                'description' => 'Committed to supporting student initiatives and fostering a collaborative campus environment.',
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Garcia',
                'course' => 'BS Computer Science',
                'position' => 'Vice President',
                'partylist' => 'Progressive Alliance',
                'gender' => 'female',
                'description' => 'Experienced organizer focused on student welfare and academic support programs.',
            ],

            // Secretary Candidates
            [
                'first_name' => 'Miguel',
                'last_name' => 'Torres',
                'course' => 'BS Information Systems',
                'position' => 'Secretary',
                'partylist' => 'Unity Party',
                'gender' => 'male',
                'description' => 'Detail-oriented and organized, committed to transparent communication and documentation.',
            ],
            [
                'first_name' => 'Isabella',
                'last_name' => 'Cruz',
                'course' => 'BS Computer Science',
                'position' => 'Secretary',
                'partylist' => 'Student First Coalition',
                'gender' => 'female',
                'description' => 'Efficient communicator dedicated to keeping students informed and engaged.',
            ],

            // Treasurer Candidates
            [
                'first_name' => 'Rafael',
                'last_name' => 'Aquino',
                'course' => 'BS Information Technology',
                'position' => 'Treasurer',
                'partylist' => 'Progressive Alliance',
                'gender' => 'male',
                'description' => 'Financially responsible with experience in budget management and fiscal transparency.',
            ],
            [
                'first_name' => 'Gabriela',
                'last_name' => 'Ramos',
                'course' => 'BS Computer Engineering',
                'position' => 'Treasurer',
                'partylist' => 'Unity Party',
                'gender' => 'female',
                'description' => 'Trustworthy and meticulous in handling student funds and financial planning.',
            ],

            // Auditor Candidates
            [
                'first_name' => 'Diego',
                'last_name' => 'Fernandez',
                'course' => 'BS Computer Science',
                'position' => 'Auditor',
                'partylist' => 'Student First Coalition',
                'gender' => 'male',
                'description' => 'Committed to accountability and ensuring proper use of student organization resources.',
            ],
            [
                'first_name' => 'Lucia',
                'last_name' => 'Morales',
                'course' => 'BS Information Systems',
                'position' => 'Auditor',
                'partylist' => 'Progressive Alliance',
                'gender' => 'female',
                'description' => 'Analytical and thorough in reviewing financial records and organizational processes.',
            ],

            // Public Relations Officer Candidates
            [
                'first_name' => 'Antonio',
                'last_name' => 'Villanueva',
                'course' => 'BS Information Technology',
                'position' => 'Public Relations Officer',
                'partylist' => 'Unity Party',
                'gender' => 'male',
                'description' => 'Creative communicator skilled in social media and public engagement strategies.',
            ],
            [
                'first_name' => 'Carmen',
                'last_name' => 'Santiago',
                'course' => 'BS Computer Science',
                'position' => 'Public Relations Officer',
                'partylist' => 'Student First Coalition',
                'gender' => 'female',
                'description' => 'Energetic and personable, dedicated to promoting student activities and achievements.',
            ],
        ];

        echo "Downloading profile photos from randomuser.me...\n\n";

        foreach ($nominees as $index => $nomineeData) {
            $gender = $nomineeData['gender'];
            unset($nomineeData['gender']);
            
            // Use randomuser.me API for realistic photos
            $seed = md5($nomineeData['first_name'] . $nomineeData['last_name']);
            $apiUrl = "https://randomuser.me/api/?gender={$gender}&seed={$seed}&nat=us";
            
            try {
                $response = @file_get_contents($apiUrl);
                
                if ($response !== false) {
                    $data = json_decode($response, true);
                    
                    if (isset($data['results'][0]['picture']['large'])) {
                        $imageUrl = $data['results'][0]['picture']['large'];
                        $imageContent = @file_get_contents($imageUrl);
                        
                        if ($imageContent !== false) {
                            $filename = 'nominees/' . strtolower($nomineeData['position']) . '_' . strtolower($nomineeData['first_name']) . '.jpg';
                            Storage::disk('public')->put($filename, $imageContent);
                            $nomineeData['image'] = $filename;
                            echo "✓ Downloaded photo for {$nomineeData['first_name']} {$nomineeData['last_name']}\n";
                        } else {
                            echo "✗ Failed to download photo for {$nomineeData['first_name']} {$nomineeData['last_name']}\n";
                            $nomineeData['image'] = null;
                        }
                    }
                } else {
                    echo "✗ API request failed for {$nomineeData['first_name']} {$nomineeData['last_name']}\n";
                    $nomineeData['image'] = null;
                }
            } catch (\Exception $e) {
                echo "✗ Error: " . $e->getMessage() . "\n";
                $nomineeData['image'] = null;
            }

            // Create nominee
            Nominee::create($nomineeData);
            
            // Small delay to avoid rate limiting
            usleep(200000); // 0.2 seconds
        }

        echo "\n✓ Successfully seeded " . count($nominees) . " nominees with photos!\n";
    }
}
