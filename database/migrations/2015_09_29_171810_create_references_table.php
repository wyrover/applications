<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applications_id');
            $table->integer('company_id');
            $table->integer('user_id');
            $table->string('referee_name')->nullable();
            $table->string('referee_company')->nullable();
            $table->string('referee_email')->nullable();
            $table->string('referee_relationship')->nullable();
            $table->string('referee_start_date')->nullable();
            $table->string('referee_end_date')->nullable();
            $table->string('referee_current_employer')->nullable();
            $table->string('referee_contact')->nullable();
            $table->string('referee_name2')->nullable();
            $table->string('referee_company2')->nullable();
            $table->string('referee_email2')->nullable();
            $table->string('referee_relationship2')->nullable();
            $table->string('referee_start_date2')->nullable();
            $table->string('referee_end_date2')->nullable();
            $table->string('referee_current_employer2')->nullable();
            $table->string('referee_contact2')->nullable();
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
        Schema::drop('references');
    }
}
