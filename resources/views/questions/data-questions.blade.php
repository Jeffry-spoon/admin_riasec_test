@extends('layouts.app')

@section('content')
    <main class="main-content">
        @include('components.navbar')

        <div class="conatiner-fluid content-inner mt-4 py-0">
            <div class="row" style="margin-top: 60px">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Quizzes & Surveys</h4>
                                <a class="btn btn-border ps-4" href="{{ url('result/export/excel') }}">
                                    Add New
                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>

                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Data Table !-->
                        <div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body px-0">
                                            <div class="table-responsive">
                                                <table id="user-list-table" class="table table-striped" role="grid"
                                                    data-bs-toggle="data-table">
                                                    <thead>
                                                        <tr class="ligth">
                                                            <th>Title</th>
                                                            <th>No. of Questions</th>
                                                            <th>Participants</th>
                                                            <th>Created at</th>
                                                            <th>Updated at</th>
                                                            <th>Active</th>
                                                            <th style="min-width: 100px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        use Carbon\Carbon;
                                                    @endphp
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('components.footer')
    </main>
@endsection
