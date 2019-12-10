<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');

            $table->string('post_key');
            $table->string('result_datetime');

            $table->bigInteger('result_position');
            $table->longText('result_url');

            $table->integer('keyword_id');

            $table->integer('task_id');

            $table->integer('user_id');
            $table->bigInteger('result_task_id');
            $table->string('result_post_id');
            $table->bigInteger('result_se_id');
            $table->bigInteger('result_loc_id');
            $table->string('key_id');

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
        Schema::dropIfExists('results');
    }
}
