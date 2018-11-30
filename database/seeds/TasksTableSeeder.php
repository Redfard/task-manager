<?php

use Illuminate\Database\Seeder;
use App\Entities\Tasks;
use App\Entities\Status;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workStatus = Status::where('title', 'in work')->first();

        $task1 = Tasks::create([
            'title' => 'demo task 1',
            'time' => Carbon::createFromDate(2019, 2, 15)->format('Y-m-d H:i:s'),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam beatae corporis, culpa ex maxime necessitatibus nisi pariatur perspiciatis quisquam sint sit voluptatum. Atque exercitationem obcaecati quia soluta, velit voluptatem'
        ]);
        $task1->status()->associate($workStatus)->save();

        Tasks::create([
            'title' => 'demo task 2',
            'time' => Carbon::createFromDate(2019, 3, 15)->format('Y-m-d H:i:s'),
        ]);
    }
}
