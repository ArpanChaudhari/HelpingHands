<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $campaigns = [
            [
                'title' => 'Disaster Relief Fund',
                'slug' => 'disaster-relief-fund',
                'image' => 'priority_causes/Disaster_Relief_Fund.webp',
                'description' => 'Help people affected by disasters like floods and earthquakes.',
                'amount_raised' => 581351,
                'backers' => 425,
                'progress' => 60,
                'goal_amount' => 800000,
            ],
            [
                'title' => 'Hunger Eradication Drives',
                'slug' => 'hunger-eradication-drives',
                'image' => 'priority_causes/Hunger_Eradication_Drives.jpg',
                'description' => 'Join hands to provide meals to the needy and homeless.',
                'amount_raised' => 345000,
                'backers' => 190,
                'progress' => 45,
                'goal_amount' => 800000,
            ],
            [
                'title' => 'Medical Assistance & Health Camps',
                'slug' => 'medical-assistance-health-camps',
                'image' => 'priority_causes/Medical_Assistance_Health_Camps.webp',
                'description' => 'Support health camps and medical help for underprivileged communities.',
                'amount_raised' => 220000,
                'backers' => 98,
                'progress' => 70,
                'goal_amount' => 800000,
            ],
            [
                'title' => 'Animal Rescue & Welfare',
                'slug' => 'animal-rescue-welfare',
                'image' => 'priority_causes/Animal_Rescue_Welfare.webp',
                'description' => 'Help rescue and care for injured and abandoned animals.',
                'amount_raised' => 790000,
                'backers' => 560,
                'progress' => 80,
                'goal_amount' => 800000,
            ],
            [
                'title' => 'Support for People with Disabilities',
                'slug' => 'support-people-with-disabilities',
                'image' => 'priority_causes/Support_for_People_with_Disabilities.webp',
                'description' => 'Aid individuals with disabilities through education and mobility support.',
                'amount_raised' => 195000,
                'backers' => 80,
                'progress' => 35,
                'goal_amount' => 800000,
            ],
            [
                'title' => 'Orphan & Shelter Support',
                'slug' => 'orphan-shelter-support',
                'image' => 'priority_causes/Orphan_Shelter_Support.jpg',
                'description' => 'Ensure food, education, and care for orphans and homeless children.',
                'amount_raised' => 130000,
                'backers' => 50,
                'progress' => 25,
                'goal_amount' => 800000,
            ],
            [
                'title' => 'Senior Citizen Care',
                'slug' => 'senior-citizen-care',
                'image' => 'priority_causes/senior_Citizen_Care.jpg',
                'description' => 'Support elderly individuals with shelter, care, and dignity.',
                'amount_raised' => 615000,
                'backers' => 300,
                'progress' => 65,
                'goal_amount' => 800000,
            ],
            [
                'title' => 'Anti-Child Labor Campaign',
                'slug' => 'anti-child-labor-campaign',
                'image' => 'priority_causes/Anti_Child_Labor_Campaign.jpg',
                'description' => 'Fight child labor and support rescued children with rehabilitation.',
                'amount_raised' => 275000,
                'backers' => 130,
                'progress' => 48,
                'goal_amount' => 800000,
            ],
        ];

        foreach ($campaigns as $data) {
            Campaign::create($data);
        }
    }
}
