<?php

use Illuminate\Database\Seeder;

class AllTaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Project 1', 'task_belongs_to' => 'Catalin', 'in_analysis' => 1, 'in_process' => 0, 'done' => 0,],

        ];

        foreach ($items as $item) {
            \App\AllTask::create($item);
        }
    }
}
