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
                    <td>{{ \Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i') }}</td>
                    <td>{{ $result->start_time }}</td>
                    <td>{{ $result->end_time }}</td>
                    <td>{{ $result->difference }}</td>
                    <td>{{ $result->event_title }}</td>
                    <td>{{ $result->type_title }}</td>
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
