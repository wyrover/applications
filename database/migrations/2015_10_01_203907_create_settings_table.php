<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('references_id');
            $table->integer('application_id');
            $table->text('label');
            $table->integer('hide');
            $table->integer('mandatory');
            $table->string('type');
            $table->text('options');
            $table->text('label2');
            $table->integer('hide2');
            $table->integer('mandatory2');
            $table->string('type2');
            $table->text('options2');
            $table->text('label3');
            $table->integer('hide3');
            $table->integer('mandatory3');
            $table->string('type3');
            $table->text('options3');
            $table->text('label4');
            $table->integer('hide4');
            $table->integer('mandatory4');
            $table->string('type4');
            $table->text('options4');
            $table->text('label5');
            $table->integer('hide5');
            $table->integer('mandatory5');
            $table->string('type5');
            $table->text('options5');
            $table->text('label6');
            $table->integer('hide6');
            $table->integer('mandatory6');
            $table->string('type6');
            $table->text('options6');
            $table->text('label7');
            $table->integer('hide7');
            $table->integer('mandatory7');
            $table->string('type7');
            $table->text('options7');
            $table->text('label8');
            $table->integer('hide8');
            $table->integer('mandatory8');
            $table->string('type8');
            $table->text('options8');
            $table->text('label9');
            $table->integer('hide9');
            $table->integer('mandatory9');
            $table->string('type9');
            $table->text('options9');
            $table->text('label10');
            $table->integer('hide10');
            $table->integer('mandatory10');
            $table->string('type10');
            $table->text('options10');
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
        Schema::drop('settings');
    }
}
