<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->integer('loan_type_id');
            $table->string('loan_control_number');
            $table->string('loan_amount');
            $table->string('loan_duration');
            $table->string('purpose');
            $table->string('loan_status');
            $table->string('loan_remarks');
            $table->dateTime('loan_apply_date');
            $table->dateTime('loan_approval_date');
            $table->float('loan_interest_rate');
            $table->string('mode_of_payment');
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
        Schema::dropIfExists('loan_application');
    }
}
