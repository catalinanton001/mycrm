<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544569606AllTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('all_tasks')) {
            Schema::create('all_tasks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('task_belongs_to');
                $table->tinyInteger('in_analysis')->nullable()->default('0');
                $table->tinyInteger('in_process')->nullable()->default('0');
                $table->tinyInteger('done')->nullable()->default('0');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_tasks');
    }
}
