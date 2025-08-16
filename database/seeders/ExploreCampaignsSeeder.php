<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\ExploreCampaign;

class ExploreCampaignsSeeder extends Seeder
{
    public function run(): void
    {
        $campaigns = [
            [
                'title' => 'Help Krishna Fight For His Life Again',
                'description' => 'Support Krishna’s medical treatment...',
                'image' => 'image/explore compaigns/Help Krishna Fight For His Life Again.webp',
                'goal_amount' => 700000,
                'amount_raised' => 333824,
                'backers' => 325,
                'category' => 'animal',
            ],
            [
                'title' => 'Support Medical Treatment Of Rescued Animals',
                'description' => 'Treat injured and rescued animals.',
                'image' => 'image/explore compaigns/he-left-job.webp',
                'goal_amount' => 500000,
                'amount_raised' => 213650,
                'backers' => 298,
                'category' => 'animal',
            ],
            [
                'title' => 'Help Sumantha Get The Care She Deserves',
                'description' => 'Support Sumantha’s education and wellbeing.',
                'image' => 'image/explore compaigns/Help Sumantha Get The Care She Deserves.webp',
                'goal_amount' => 300000,
                'amount_raised' => 188321,
                'backers' => 210,
                'category' => 'children',
            ],
            [
                'title' => 'Support Poor Children With Mid Day Meals',
                'description' => 'Feed underprivileged children in schools.',
                'image' => 'image/explore compaigns/Support Poor Children With Mid Day Meals.jpg',
                'goal_amount' => 250000,
                'amount_raised' => 125000,
                'backers' => 187,
                'category' => 'children',
            ],
            [
                'title' => 'Provide Relief Kits To Flood-Hit Assam',
                'description' => 'Emergency supplies for flood victims.',
                'image' => 'image/explore compaigns/Provide Relief Kits To Flood-Hit Assam.jpeg',
                'goal_amount' => 800000,
                'amount_raised' => 392150,
                'backers' => 312,
                'category' => 'disaster',
            ],
            [
                'title' => 'Support People Affected By Landslides In Sikkim',
                'description' => 'Emergency help for displaced families.',
                'image' => 'image/explore compaigns/Support People Affected By Landslides In Sikkim.avif',
                'goal_amount' => 600000,
                'amount_raised' => 275400,
                'backers' => 278,
                'category' => 'disaster',
            ],
            [
                'title' => 'Support Local Temple Renovation',
                'description' => 'Restore and renovate community temples.',
                'image' => 'image/explore compaigns/Support Local Temple Renovation.jpg',
                'goal_amount' => 250000,
                'amount_raised' => 150000,
                'backers' => 120,
                'category' => 'faith',
            ],
            [
                'title' => 'Sponsor Meals For Abandoned Elders',
                'description' => 'Daily meals for elderly in need.',
                'image' => 'image/explore compaigns/Sponsor Meals For Abandoned Elders.jpg',
                'goal_amount' => 700000,
                'amount_raised' => 400100,
                'backers' => 342,
                'category' => 'elderly',
            ],
            [
                'title' => 'Help Old Age Homes With Medical Supplies',
                'description' => 'Provide medicines and health kits.',
                'image' => 'image/explore compaigns/Help Old Age Homes With Medical Supplies.avif',
                'goal_amount' => 500000,
                'amount_raised' => 222250,
                'backers' => 190,
                'category' => 'elderly',
            ],
            [
                'title' => 'Support Education Of Underprivileged Girls',
                'description' => 'Educate the girl child for a brighter future.',
                'image' => 'image/explore compaigns/Support Education Of Underprivileged Girls.jpg',
                'goal_amount' => 600000,
                'amount_raised' => 355900,
                'backers' => 400,
                'category' => 'education',
            ],
            [
                'title' => 'Provide School Kits To Tribal Children',
                'description' => 'School bags, books and supplies.',
                'image' => 'image/explore compaigns/Provide School Kits To Tribal Children.jpeg',
                'goal_amount' => 300000,
                'amount_raised' => 178000,
                'backers' => 230,
                'category' => 'education',
            ],
            [
                'title' => 'Empower Women With Stitching Machines',
                'description' => 'Skill building for self-reliance.',
                'image' => 'image/explore compaigns/Empower Women With Stitching Machines.jpg',
                'goal_amount' => 350000,
                'amount_raised' => 192300,
                'backers' => 210,
                'category' => 'women',
            ],
            [
                'title' => 'Support Domestic Violence Survivors',
                'description' => 'Rehabilitation and legal aid for survivors.',
                'image' => 'image/explore compaigns/Support Domestic Violence Survivors.jpg',
                'goal_amount' => 400000,
                'amount_raised' => 210000,
                'backers' => 195,
                'category' => 'women',
            ],
            [
                'title' => 'Distribute Grocery Kits To Daily Wage Workers',
                'description' => 'Help struggling families with essentials.',
                'image' => 'image/explore compaigns/Distribute Grocery Kits To Daily Wage Workers.webp',
                'goal_amount' => 500000,
                'amount_raised' => 310100,
                'backers' => 290,
                'category' => 'hunger',
            ],
            [
                'title' => 'Feed The Hungry In Slums Of Mumbai',
                'description' => 'Daily food to the most vulnerable.',
                'image' => 'image/explore compaigns/Feed The Hungry In Slums Of Mumbai.jpeg',
                'goal_amount' => 400000,
                'amount_raised' => 288700,
                'backers' => 270,
                'category' => 'hunger',
            ],
            [
                'title' => 'Help Rajesh Undergo Heart Surgery',
                'description' => 'Critical heart operation for survival.',
                'image' => 'image/explore compaigns/Help Rajesh Undergo Heart Surgery.webp',
                'goal_amount' => 800000,
                'amount_raised' => 390000,
                'backers' => 310,
                'category' => 'medical',
            ],
            [
                'title' => 'Provide Medicines To Critical Patients',
                'description' => 'Support urgent care with medicines.',
                'image' => 'image/explore compaigns/Provide Medicines To Critical Patients.webp',
                'goal_amount' => 500000,
                'amount_raised' => 220000,
                'backers' => 220,
                'category' => 'medical',
            ],
            [
                'title' => 'Support Kanwar Yatra Devotees',
                'description' => 'Provide fresh meals and clean water to devoted travellers.',
                'image' => 'image/explore compaigns/Support Kanwar Yatra Devotees with Meals & Clean Water.webp',
                'goal_amount' => 250000,
                'amount_raised' => 85000,
                'backers' => 90,
                'category' => 'faith',
            ],

        ];

        foreach ($campaigns as $item) {
            ExploreCampaign::create([
                ...$item,
                'slug' => Str::slug($item['title']),
            ]);
        }
    }
}
