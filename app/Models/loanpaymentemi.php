<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanpaymentemi extends Model
{
    use HasFactory;
    protected $table = "loan_paymentemi";

    public function loanapplication()
    {
       return $this->belongsTo(loanapplication::class, 'loan_applications_id');
    }
}
