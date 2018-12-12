<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544567884TasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            
if (!Schema::hasColumn('tasks', 'in_analysis')) {
                $table->tinyInteger('in_analysis')->nullable()->default('0');
                }
if (!Schema::hasColumn('tasks', 'in_process')) {
                $table->tinyInteger('in_process')->nullable()->default('0');
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('in_analysis');
            $table->dropColumn('in_process');
            
        });

    }
}
