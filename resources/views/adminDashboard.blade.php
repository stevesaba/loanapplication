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

            <table  class="table table-striped " style="width:100%">
              <thead>
                <tr>
                  <th>Welcome Guest, </th>
                </tr>
              </thead>


              <tbody>
                <tr>
                  <td>Requested Form for Loan Applicaiton</td>

                </tr>


                
              </tbody>
            </table>  


           @include("includes/menu_footer") 
        </div>
      </div>
    </div>


@endsection