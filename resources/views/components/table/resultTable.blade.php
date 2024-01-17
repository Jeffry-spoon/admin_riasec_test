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
