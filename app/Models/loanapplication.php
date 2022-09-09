<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanapplication extends Model
{
    use HasFactory;
    protected $table = "loan_application";

    public function users()
    {
       return $this->belongsTo(User::class, 'users_id');
    }
}
