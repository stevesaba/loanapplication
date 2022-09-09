<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanPaymentemiCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_paymentemi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_applications_id')->constrained();
            $table->integer('users_id');
            $table->string('loan_control_number');
            $table->string('loan_payment_amount');
            $table->date('loan_payment_duedate');
            $table->dateTime('loan_payment_date');
            $table->string('loan_payment_status');
            $table->string('loan_payment_reference_number');
            $table->string('loan_payment_details');
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
        Schema::dropIfExists('loan_paymentemi_create');
    }
}
