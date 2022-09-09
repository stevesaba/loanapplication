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
            <h1 class="page-title">Approval</h1>
            <ul class="breadcrumbs">
              <li>
                <a href="#"><i class="las la-tachometer-alt"></i></a>
              </li>
              <li class="separator">
                <a>/</a>
              </li>
              <li class="active">
                <a href="#">Approval</a>
              </li>
            </ul>
            <div class="expor-data ml-auto">
              <!--
              <label for="Export Data">Export Data</label>
              <a href="#">
                <img src="images/excel.png" alt="excel" class="exp-icon">
              </a>
              <a href="#">
                <img src="images/pdf.png" alt="pdf" class="exp-icon">
              </a>-->
            </div>
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
                  <th>Approved on</th>
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
                  <td>{!! $loandata['loan_approval_date'] !!}</td>
                  <td>{!! $loandata['loan_amount'] !!}</td>
                  <td>{!! $loandata['loan_duration'] !!} yrs</td>
                  <td><a href="#">Approved</a></td>
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

@endsection    