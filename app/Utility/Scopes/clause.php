<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clause extends Model
{
    public function ScopeStatus($query)
	{
		return $query->where('status', '1');
	}
}
