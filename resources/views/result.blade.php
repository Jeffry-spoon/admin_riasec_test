@extends('layouts.app')
@section('content')
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
                            <div class="header-title d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Result</h4>
                                <a class="btn btn-border" href="{{ url('result/export/excel') }}">
                                    Export
                                    <svg class="icon-24 ms-2" width="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.1221 15.436L12.1221 3.39502" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15.0381 12.5083L12.1221 15.4363L9.20609 12.5083" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M16.7551 8.12793H17.6881C19.7231 8.12793 21.3721 9.77693 21.3721 11.8129V16.6969C21.3721 18.7269 19.7271 20.3719 17.6971 20.3719L6.55707 20.3719C4.52207 20.3719 2.87207 18.7219 2.87207 16.6869V11.8019C2.87207 9.77293 4.51807 8.12793 6.54707 8.12793L7.48907 8.12793"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
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
