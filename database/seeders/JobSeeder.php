<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $tag = Tag::factory(3)->create();
        Job::factory(25)->create(new Sequence([
            'featured' => true,
            'employment_type' => 'Full Time',
        ],
        [
            'featured' => false,
            'employment_type' => 'Part Time',
        ]));
    }
}
