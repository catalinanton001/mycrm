<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544567686TasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            if(Schema::hasColumn('tasks', 'done')) {
                $table->dropColumn('done');
            }
            
        });
Schema::table('tasks', function (Blueprint $table) {
            
if (!Schema::hasColumn('tasks', 'done')) {
                $table->tinyInteger('done')->nullable()->default('0');
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
            $table->dropColumn('done');
            
        });
Schema::table('tasks', function (Blueprint $table) {
                        $table->tinyInteger('done')->default('0');
                
        });

    }
}
