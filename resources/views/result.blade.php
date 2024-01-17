@extends('layouts.app') @section('content')
<main class="main-content">
    @include('components.navbar')
    <div class="position-relative iq-banner">
        <!--Nav Start-->
    </div>
    <div class="conatiner-fluid content-inner mt-5 py-0">
        <div class="row" style="margin-top: 80px">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div
                            class="header-title d-flex align-items-center justify-content-between"
                        >
                            <h4 class="card-title">Result</h4>
                            <a  class="btn btn-border" href="{{ url('result/export/excel') }}">
                                Export
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           @include('components.table.resultTable', $results)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</main>
@endsection
