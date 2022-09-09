@extends('layouts/master')

@section('leftmenu')
@include("includes/menu_left") 
@endsection

@section('headermenu')
@include("includes/menu_header") 
@endsection

@section('mainarea')

<div class="main-panel">
			<div class="content">
				<div class="page-header">
						<h1 class="page-title">Apply</h1>
						<ul class="breadcrumbs">
							<li>
								<a href="#"><i class="las la-tachometer-alt"></i></a>
							</li>
							<li class="separator">
								<a>/</a>
							</li>
							<li class="active">
								<a href="#">New Loan Application</a>
							</li>
						</ul>
						
					</div>
				<div class="page-inner">
					<div class="content-wrapper white-bg">
					<div class="login-form">
					 <div class="form_sect">
					 	
					 	@if(Session::get('message')<>'')
						    <!--{{Session::get('message')}}-->
						    <h1>{{ session()->get('message') }}</h1>
						@else 
						    <h1>New Loan Application Form</h1>
						@endif
						  
						  <form action="{{ url('customerNewApplicationAct')}}"  method="post">
							<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
							<div class="form-group field mb30">
							  <select name="loan_type_id" class="custom-select">
							  <option>Loan Type</option>
							  @foreach ($loanTypeData as $loanTypeData)
							  	<option value="{{$loanTypeData->id;}}">{{$loanTypeData->loan_name;}}</option>
							  @endforeach
							  </select>	
							</div>
							<div class="form-group field mb30">
							  <select name="loan_duration" class="custom-select">
							  <option>Loan Duration</option>
							  	<option value="1">1 Year(S)</option>
							  	<option value="2">2 Year(S)</option>
							  	<option value="3">3 Year(S)</option>
							  	<option value="4">4 Year(S)</option>
							  	<option value="5">5 Year(S)</option>
							  	<option value="6">6 Year(S)</option>
							  	<option value="7">7 Year(S)</option>
							  	<option value="8">8 Year(S)</option>
							  	<option value="9">9 Year(S)</option>
							  	<option value="10">10 Year(S)</option>
							  </select>	
							</div>
							<div class="form-group field">
							  <input type="text" class="custom-select" name="loan_amount" placeholder="Loan Amount">
							</div>
							<div class="form-group field mb30">
							  <input type="text" name="loan_interest_rate" class="custom-select" value="12%" placeholder="loan Interest Rate" readonly>
							</div>
							<div><input type="submit" name="submit" class="btn btn-info" value="Apply Now"></div>
							<div class="clearfix">
								Please fill carefully, our team will revert back you soon. 
							</div>
						  </form>
					  </div>
					</div>
					</div>
					 @include("includes/menu_footer") 
				</div>
			</div>
		</div>

@endsection    