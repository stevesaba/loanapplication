<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loantype;
use App\Models\loanapplication;
use App\Models\loanpaymentemi;
use Session;

class customercontroller extends Controller
{
    protected $loantypeobj;
    protected $loanapplicationobj;
    protected $loanpaymentemiobj;
    public function __construct(){
        $this->loantypeobj = new loantype();
        $this->loanapplicationobj = new loanapplication();
        $this->loanpaymentemiobj = new loanpaymentemi();
    }
       
    public function customerDashboard()
    {
        return view('customerDashboard',['CustomerName'=>Session::get('CustomerName'),'CustomerID'=>Session::get('CustomerID'),'CustomerEmail'=>Session::get('CustomerEmail'),'CustomerToken'=>Session::get('CustomerToken')]);
    }
    public function customerNewApplication()
    {
        /** Find the Loan Type data **/
        $loanTypeData = $this->loantypeobj->getloantype();
        
        return view('customerApplyNewApplication',['loanTypeData'=>$loanTypeData,'CustomerName'=>Session::get('CustomerName'),'CustomerID'=>Session::get('CustomerID'),'CustomerEmail'=>Session::get('CustomerEmail'),'CustomerToken'=>Session::get('CustomerToken')]);
    }

    public function customerNewApplicationAct(Request $request)
    {
        /** Find the Loan Type data **/
        $loanTypeData = $this->loantypeobj->getloantype();

        $record= new loanapplication();
        $record->loan_type_id = $request->loan_type_id;
        $record->loan_amount = $request->loan_amount;
        $record->loan_duration = $request->loan_duration;
        $record->loan_interest_rate = $request->loan_interest_rate;

        $record->users_id=Session::get('CustomerID');
        $record->loan_control_number="";
        $record->purpose="";
        $record->loan_status="1";
        $record->loan_remarks="Apply";
        $record->loan_apply_date=date('Y-m-d H:i:s');
        $record->loan_approval_date=date('Y-m-d H:i:s');
        $record->loan_interest_rate=substr($record->loan_interest_rate,0,-1);
        $record->mode_of_payment="";
        //dd($record);
        
        $Appval = $record->save();
        if($Appval)
        {
            $message="Application form submitted successfully, Thank you.";
            //$message="1";
        }else{

            $message="There are some error please try again.";
            //$message="0";
        } 

        return redirect('/customerNewApplication')->with(['loanTypeData'=>$loanTypeData,'message'=>$message,'CustomerName'=>Session::get('CustomerName'),'CustomerID'=>Session::get('CustomerID'),'CustomerEmail'=>Session::get('CustomerEmail'),'CustomerToken'=>Session::get('CustomerToken')]);
    }


    
    public function customerAppliedLoan()
    {
        if($this->checkLogin()==false)
        { return redirect('/customerlogin'); }        

        $loandata = loanapplication::with('users')->where('loan_status','2')->where('users_id',Session::get('CustomerID'))
        ->get()->toArray();
        //dd($loandata);

        return view('customerAppliedLoan',['CustomerName'=>Session::get('CustomerName'),'CustomerID'=>Session::get('CustomerID'),'CustomerEmail'=>Session::get('CustomerEmail'),'CustomerToken'=>Session::get('CustomerToken'),'loandata'=>$loandata]);
    }

    public function checkLogin()
    {
        if(Session::get('CustomerName')=='' || Session::get('CustomerName')==null)
        {
            return false;
        }  
        else 
        { return true; }      
    }

    public function customerLogout(Request $request) {
        //Auth::logout();
        Session::flush();
        return redirect('/customerlogin');
    }
   

}
