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
                            <button type="submit" class="btn btn-border">
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="datatable"
                                class="table table-striped"
                                data-toggle="data-table"
                            >
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
                                    </tr>

                                </thead>

                                <tbody>
                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->email }}</td>
                                        <td>{{ $result->phone_number }}</td>
                                        <td
                                            style="min-width: 150px"
                                            class="text-wrap"
                                        >
                                            {{ $result->school_name }}
                                        </td>
                                        <td>{{ $result->occupation_desc }}</td>
                                        @php
                                            $score=json_decode($result->score, true);
                                        @endphp
                                        <td>{{ $score['R'] }}</td>
                                        <td>{{ $score['I'] }}</td>
                                        <td>{{ $score['A'] }}</td>
                                        <td>{{ $score['S'] }}</td>
                                        <td>{{ $score['E'] }}</td>
                                        <td>{{ $score['C'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i') }}</td>

                                    </tr>
                                     @endforeach
                                </tbody>
                                <!-- <tfoot>
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
                                    </tr>
                                </tfoot> -->
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
