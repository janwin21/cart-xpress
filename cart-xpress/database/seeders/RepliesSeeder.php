<?php

namespace Database\Seeders;

use App\Models\Replies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Replies::factory()->times(1000)->create();
    }
}
