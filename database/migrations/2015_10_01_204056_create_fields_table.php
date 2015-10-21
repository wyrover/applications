<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('settings_id');
            $table->integer('company_id');
            $table->integer('references_id');
            $table->integer('user_id');
            $table->text('label');
            $table->string('answer');
            $table->text('label2');
            $table->string('answer2');
            $table->text('label3');
            $table->string('answer3');
            $table->text('label4');
            $table->string('answer4');
            $table->text('label5');
            $table->string('answer5');
            $table->text('label6');
            $table->string('answer6');
            $table->text('label7');
            $table->string('answer7');
            $table->text('label8');
            $table->string('answer8');
            $table->text('label9');
            $table->string('answer9');
            $table->text('label10');
            $table->string('answer10');
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
        Schema::drop('fields');
    }
}
