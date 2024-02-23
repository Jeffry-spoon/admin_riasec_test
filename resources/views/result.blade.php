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
                                <a class="btn btn-border" href="{{ url('result/download/pdf') }}">
                                    Export to PDF
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
                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>School Name</th>
                                            <th>Future Occupation</th>
                                            <th>R</th>
                                            <th>I</th>
                                            <th>A</th>
                                            <th>S</th>
                                            <th>E</th>
                                            <th>C</th>
                                            <th>Test Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Completion Time</th>
                                            <th>Event</th>
                                            <th>Quizzes & Surveys </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{ $result->name }}</td>
                                                <td>{{ $result->email }}</td>
                                                <td>{{ $result->phone_number }}</td>
                                                <td style="min-width: 150px" class="text-wrap">
                                                    {{ $result->school_name }}
                                                </td>
                                                <td>{{ $result->occupation_desc }}</td>
                                                @php
                                                    $score = json_decode($result->score, true);
                                                @endphp
                                                @if (isset($score['REALISTIC']))
                                                    <td>{{ $score['REALISTIC'] }}</td>
                                                @elseif(isset($score['R']))
                                                    <td>{{ $score['R'] }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif

                                                @if (isset($score['INVESTIGATIVE']))
                                                    <td>{{ $score['INVESTIGATIVE'] }}</td>
                                                @elseif(isset($score['I']))
                                                    <td>{{ $score['I'] }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                                @if (isset($score['ARTISTIC']))
                                                    <td>{{ $score['ARTISTIC'] }}</td>
                                                @elseif(isset($score['A']))
                                                    <td>{{ $score['A'] }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                                @if (isset($score['SOCIAL']))
                                                    <td>{{ $score['SOCIAL'] }}</td>
                                                @elseif(isset($score['S']))
                                                    <td>{{ $score['S'] }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                                @if (isset($score['ENTERPRISING']))
                                                    <td>{{ $score['ENTERPRISING'] }}</td>
                                                @elseif(isset($score['E']))
                                                    <td>{{ $score['E'] }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                                @if (isset($score['CONVENTIONAL']))
                                                    <td>{{ $score['CONVENTIONAL'] }}</td>
                                                @elseif(isset($score['C']))
                                                    <td>{{ $score['C'] }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                                <td>{{ \Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i') }}
                                                </td>
                                                <td>{{ $result->start_time }}</td>
                                                <td>{{ $result->end_time }}</td>
                                                <td>{{ $result->difference }}</td>
                                                <td>{{ $result->event_title }}</td>
                                                <td>{{ $result->type_title }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>School Name</th>
                                            <th>Future Occupation</th>
                                            <th>R</th>
                                            <th>I</th>
                                            <th>A</th>
                                            <th>S</th>
                                            <th>E</th>
                                            <th>C</th>
                                            <th>Test Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Completion Time</th>
                                            <th>Event</th>
                                            <th>Quizzes & Surveys </th>
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
