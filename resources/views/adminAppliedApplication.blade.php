@extends('layouts/master')

@section('leftmenu')
@include("includes/menu_left_admin") 
@endsection

@section('headermenu')
@include("includes/menu_header_admin") 
@endsection

@section('mainarea')
<div class="main-panel">
      <div class="content">
        <div class="page-header">
            <h1 class="page-title">Home</h1>
            <ul class="breadcrumbs">
              <li>
                <a href="#"><i class="las la-tachometer-alt"></i></a>
              </li>
              <li class="separator">
                <a>/</a>
              </li>
              <li class="active">
                <a href="#">Dashboard</a>
              </li>
            </ul>
          </div>

        <div class="page-inner">
          <div class="content-wrapper white-bg">
            
            <div class="dasboard-table mt-2 mb-3">
            <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>ID No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Requested on</th>
                  <th>Amount</th>
                  <th>Year(s)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

               @foreach ($loandata as $loandata)
                <tr>
                  <td><a href="#">LAP{!! $loandata['id'] !!}</a></td>
                  <td>{!! $loandata['users']['name'] !!}</td>
                  <td>{!! $loandata['users']['email'] !!}</td>
                  <td>{!! $loandata['loan_apply_date'] !!}</td>
                  <td>{!! $loandata['loan_amount'] !!}</td>
                  <td>{!! $loandata['loan_duration'] !!} yrs</td>
                  <td><a href="#" onclick='return doapprove("{!! $loandata['id'] !!}","{!! url("/adminApplicationApproval/")!!}")'>Approve</a></td>
                </tr>
                @endforeach
                
              </tbody>
            </table>  
          </div>
          </div>
          @include("includes/menu_footer") 
        </div>


      </div>
    </div>


<script>
function doapprove(id,url)
{
  if (confirm("Are you sure to approve this loan?") == true) {
    var text = "You pressed OK!"; 
    //alert(url);
    window.location.assign(url+"/"+id);

  } else {
   var text = "You canceled!";
  }

}
</script>      


@endsection

