<?php

namespace App\Utility\Traits;

use App\Mail;
use App\Loan;

trait Binder
{
    public function bindToApp($data)
    {
        app()->instance('Utility\Data', $data);
    }
}
