<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    protected $tasks = [
    	[
    		'name' => 'Be good at coding',
    	],
    	[
    		'name' => 'Workout in the gym',
    	],
    	[
    		'name' => 'Eat healthy food',
    	],
    ];

    public function run()
    {
        Task::truncate();

        foreach ($this->tasks as $key => $task) {
        	$vars = [
        		'name' => $task['name'],
        	];

        	\DB::beginTransaction();

        		Task::create($vars);

        	\DB::commit();
        }
    }
}
