<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\loanapplication;
use Session;
use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';

use App\Mail\LoanMail;
use Mail;

class admincontroller extends Controller
{
    
    public function checkLogin()
    {
        /*$this->middleware(function(){
            if (!Auth::check()) return 'NO';
        });*/

        //dd(Session::get('adminName'));

        if(Session::get('adminName')=='' || Session::get('adminName')==null)
        {
            return false;
        }  
        else 
        { return true; }      
    }


    function adminloginvalidate(Request $request)
    {
         
       $user = new User();
       
       $admin=$user->where([
       'email' => $request->email,
       'password' => md5($request->password),
       'status' => '1',
       'role' => '1'
        ])->get();

        //dd($admin);

        if(count($admin)>0)
        {
            $aname = ($admin[0]['name']);
            $aid = ($admin[0]['id']);
            $aemail = ($admin[0]['email']);
            Session::put('adminName', $aname);
            Session::put('adminEmail', $aemail);
            Session::put('adminId', $aid);
            return redirect('adminDashboard');
        }
        else
        {
          // return back()->withErrors(['Error','Invalid login details']);
           $return='Invalid login details';
           return redirect('adminlogin')->with('return', $return); 
        }    
    }

    public function adminDashboard($value='')
    {
       if($this->checkLogin()==false)
       { return redirect('/adminlogin'); } 
       return view('adminDashboard',['adminName'=>Session::get('adminName'),'adminId'=>Session::get('adminId'),'adminEmail'=>Session::get('adminEmail')]);
    }

    public function adminLogout(Request $request) {
        //Auth::logout();
        Session::flush();
        return redirect('/adminlogin');
    }


    public function adminAppliedApplication($value='')
    {
       if($this->checkLogin()==false)
       { return redirect('/adminlogin'); } 


        $loandata = loanapplication::with('users')->where('loan_status','1')
        ->get()->toArray();
        //dd($loandata);

       //$record= new loanapplication();  
       //$User= new User();  
       //$loandata = $record->where('loan_status','1')->get()->toArray();

       /*$loandata = $record->where('loan_status','1')
                    ->join($User,'users_id','=','User.id') 
                    ->get()->toArray();*/

        /*$loandata = \DB::table('loan_application as l')
                ->join('users as u', 'u.id', '=', 'l.users_id')
                ->where('loan_status','1')
                ->select('l.id as lid','u.id as uid','u.name','u.email','l.loan_apply_date','l.loan_amount','l.loan_duration')
                ->get()->toArray();*/


        //dd($loandata);

       return view('adminAppliedApplication',['adminName'=>Session::get('adminName'),'adminId'=>Session::get('adminId'),'adminEmail'=>Session::get('adminEmail'),'loandata'=>$loandata]);
    }


    public function adminApplicationApproval(Request $request)
    {
       if($this->checkLogin()==false)
       { return redirect('/adminlogin'); } 

        \DB::statement("update loan_application SET loan_approval_date='".date("Y-m-d H:i:s")."',loan_status='2' where id='".$request->id."' ");

        $loandataApproved = loanapplication::with('users')->where('id',$request->id)
       ->get()->toArray();

       //dd($loandataApproved);
   

        $loandata = loanapplication::with('users')->where('loan_status','1')
       ->get()->toArray();



       $destinationPath2 = $this->generatePDF($loandataApproved);
       $this->sendMail($loandataApproved,$destinationPath2);
       dd("Wait");

        //dd($loandata);

       return redirect('adminAppliedApplication')->with(['adminName'=>Session::get('adminName'),'adminId'=>Session::get('adminId'),'adminEmail'=>Session::get('adminEmail'),'loandata'=>$loandata]);
    }

	public function generateEMI($loandata)
	{
	
	
	
	}
    
	
	
	public function sendMail($loandata,$destinationPath2)
    {
        $email = $loandata[0]['users']['email'];
 
        $mailcontent= "Your loan applicaion has been approved by loan app administation, please find the attchment file for deails, regarding you EMI and details.
            

        ";

        $body = [
            'mailcontent'=>$mailcontent,
            'url_a'=>'https://www.adomestic.com/',
			"fromname"=>"Loan Application",
			"fromemail"=>"sales@adomestic.com",
			"emailsubject"=>"Loan Application Approval",
			"pdf_file"=>$destinationPath2,
			"name"=>$loandata[0]['users']['name'],
			"email"=>$email
        ];

 
        Mail::to($email)->send(new loanMail($body));
    }

    public function generatePDF($loandata)
    {
        //dd($loandata);
        $dompdf = new Dompdf(array('enable_remote' => true));
        $destinationPath = 'applicaionpdf/';
        $valfilename = "LAP".$loandata[0]['id'];
        $destinationPath2 = $destinationPath.$valfilename.'.pdf';
    
        $logoPath = url('/')."/public/images/llogo.jpg";
        
        //dd($imagePath2);
        
        $data = ['title' => 'Welcome to Loan Application'];
        
        //$pdf_text = 'CRM Report</br></br><img src="'.$imagePath2.'" id="logo" >'; 
        $pdf_text = '<!DOCTYPE html><html><head><title>Loan Application</title></head>
        <body>
        <img src="'.$logoPath.'"><br>
        <h3 align="center" style="color:#000040;">Loan Application Approval Letter</h3>
        <p>Dear '.$loandata[0]['users']['name'].',<br>Your loan applicaion has been approved by administation, please find the deails regarding you emi and all the details.</p>
        <br><br><br><br>
            Thank & Regards
            Team Loan Connect
        </body>
        </html>';

        //dd($pdf_text);    
        
        $dompdf->loadHTML($pdf_text);
        //dd($pdf_text);
        
        //$dompdf->loadHtml('myPDF');
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF 
        $dompdf->render();
        
        // save the pdf on server
        $output = $dompdf->output();
        file_put_contents($destinationPath2, $output);
		
		return $destinationPath2;

        // Output the generated PDF to Browser - show on browser scree
        //$dompdf->stream();


      /* $data = ['title' => 'Welcome to ItSolutionStuff.com'];
       $pdf = PDF::loadView('myPDF', $data);
       return $pdf->download('itsolutionstuff.pdf'); */
    }

    public function adminApprovedApplication($value='')
    {
       if($this->checkLogin()==false)
       { return redirect('/adminlogin'); } 


        $loandata = loanapplication::with('users')->where('loan_status','2')
        ->get()->toArray();
        //dd($loandata);
    
        return view('adminApprovedApplication',['adminName'=>Session::get('adminName'),'adminId'=>Session::get('adminId'),'adminEmail'=>Session::get('adminEmail'),'loandata'=>$loandata]);
    }


}
