<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ques')) {

            Schema::create('ques', function (Blueprint $table) {
                $table->increments('id');
            });
        }
        Schema::table('ques', function ($table) {

            $table->char('name', 100);
            $table->integer('timeout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ques');
    }
}
