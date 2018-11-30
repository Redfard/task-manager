<?php

use Illuminate\Database\Seeder;
use App\Entities\Status;
use Carbon\Carbon;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'title' => 'waiting',
        ]);

        Status::create([
            'title' => 'in work',
        ]);

        Status::create([
            'title' => 'done',
        ]);
    }
}
