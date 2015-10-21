<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reference_id');
            $table->integer('company_id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('ni_number')->nullable();
            $table->string('driver')->nullable();
            $table->text('endorsements')->nullable();
            $table->string('vehicle_access')->nullable();
            $table->string('right_to_work')->nullable();
            $table->string('evidence_right_to_work')->nullable();
            $table->string('visa_valid_to')->nullable();
            $table->text('comments')->nullable();
            $table->text('education')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employer_start_date')->nullable();
            $table->string('employer_end_date')->nullable();
            $table->text('employer_responsibilities')->nullable();
            $table->string('employer_name2')->nullable();
            $table->string('job_title2')->nullable();
            $table->string('employer_start_date2')->nullable();
            $table->string('employer_end_date2')->nullable();
            $table->text('employer_responsibilities2')->nullable();
            $table->string('employer_name3')->nullable();
            $table->string('job_title3')->nullable();
            $table->string('employer_start_date3')->nullable();
            $table->string('employer_end_date3')->nullable();
            $table->text('employer_responsibilities3')->nullable();
            $table->text('health_info')->nullable();
            $table->string('criminal_convictions')->nullable();
            $table->text('convictions_comments')->nullable();
            $table->string('contactable')->nullable();
            $table->string('next_of_kin_name')->nullable();
            $table->text('next_of_kin_address')->nullable();
            $table->string('next_of_kin_telephone')->nullable();
            $table->string('next_of_kin_mobile')->nullable();
            $table->string('next_of_kin_relationship')->nullable();
            $table->integer('accept_data_protection');
            $table->string('signed_by')->nullable();
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
        Schema::drop('applications');
    }
}
