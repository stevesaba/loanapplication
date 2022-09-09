<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loantype extends Model
{
    use HasFactory;
    protected $table = "loan_type";

    public function getloantype($id='')
    {
        //$where[] = [1>0];
        /*
        if(!empty($id))
        {
            $where[] = ["id","$id"];
        }
        $cmsGet = loantype::where($where)
            ->orderBy('loan_name','ASC')
            ->get();*/

        $cmsGet = loantype::when($id<>'',function($query){ 
              $query->where("id","$id");
           })
            ->orderBy('loan_name','ASC')
            ->get();
        return $cmsGet;

    }
}
