@extends('layouts.app')

@section('content')
<main class="main-content">
  @include('components.navbar')
    <div class="position-relative iq-banner">
      <!--Nav Start-->
   
   
      <!-- Nav Header Component End -->
      <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-5 py-0">
<div class="row" style="margin-top : 80px;"> 
  <div class="col-sm-12">
     <div class="card">
        <div class="card-header">
           <div class="header-title d-flex align-items-center justify-content-between">
              <h4 class="card-title">Result</h4>
              <button type="submit" class="btn btn-border">Export</button>
           </div>
        </div>
        <div class="card-body">
           <div class="table-responsive">
              <table id="datatable" class="table table-striped" data-toggle="data-table">
                 <thead>
                    <tr>
                       <th>User</th>
                       <th>Email</th>
                       <th>Phone Number</th>
                       <th>School Name</th>
                       <th>R</th>
                       <th>I</th>
                       <th>A</th>
                       <th>S</th>
                       <th>E</th>
                       <th>C</th>
                    </tr>
                 </thead>
                 <tbody>
                      <tr>
                       <td>Kak Tri</td>
                       <td>tri@civitas.ukrida.ac.id</td>
                       <td>123412341234</td>
                       <td style="min-width: 150px;" class="text-wrap">Universitas Kristen Krida Wacana</td>
                       <td>50</td>
                       <td>50</td>
                       <td>50</td>
                       <td>50</td>
                       <td>50</td>
                       <td>50</td>
                      </tr>
                      <tr>
                          <td>Kak Tri</td>
                          <td>tri@civitas.ukrida.ac.id</td>
                          <td>123412341234</td>
                          <td style="min-width: 150px;" class="text-wrap">Universitas Kristen Krida Wacana</td>
                          <td>50</td>
                          <td>50</td>
                          <td>50</td>
                          <td>50</td>
                          <td>50</td>
                          <td>50</td>
                         </tr>
                  </tbody>
                 <tfoot>
                    <tr>
                      <th>User</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>School Name</th>
                      <th>R</th>
                      <th>I</th>
                      <th>A</th>
                      <th>S</th>
                      <th>E</th>
                      <th>C</th>
                    </tr>
                 </tfoot>
              </table>
           </div>
        </div>
     </div>
  </div>
</div>
    </div>
   
    @include('components.footer')
  
  </main>
@endsection
