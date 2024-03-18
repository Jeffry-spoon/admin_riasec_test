<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: 10px;
            /* Mengatur margin di seluruh halaman */
        }

        h1 {
            float: left;
            /* Mengatur judul ke sisi kiri */
        }

        p {
            float: right;
            /* Mengatur tanggal ekspor ke sisi kanan */
            font-size: 10px;
        }

        .header {
            display: inline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #dddddd;
        }

        .footer {
            clear: both; /* Membersihkan float sehingga footer dimulai di bawah elemen header dan tabel */
            text-align: center; /* Mengatur teks ke tengah */
            margin-top: 20px; /* Menambahkan margin atas pada footer */
            position: relative; /* Mengatur posisi footer */
        }

        .copyright {
            font-size: 10px;
            color: #666;
        }

        .barcode {
            width: 100px;
            /* Mengatur lebar barcode */
            height: 50px;
            /* Mengatur tinggi barcode */
            margin-top: 10px;
            /* Menambahkan margin atas pada barcode */
        }
    </style>
</head>
<body>
<div class="header">
    <h4>Result - {{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}</h4>
</div>
<table style="border-collapse: collapse; width: 100%;">
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
            <th>Quizzes &amp; Surveys</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($stackings as $result)
               {{-- @dd($result); --}}
            <tr>
                <td>{{ $result['name'] }}</td>
                <td>{{ $result['email'] }}</td>
                <td>{{ $result['phone_number'] }}</td>
                <td>{{ $result['school_name'] }}</td>
                <td>{{ $result['occupation']}}</td>
                @php
                    $score = json_decode($result['score'], true);
                @endphp
                <td>{{ $score['REALISTIC'] ?? ($score['R'] ?? 'N/A') }}</td>
                <td>{{ $score['INVESTIGATIVE'] ?? ($score['I'] ?? 'N/A') }}</td>
                <td>{{ $score['ARTISTIC'] ?? ($score['A'] ?? 'N/A') }}</td>
                <td>{{ $score['SOCIAL'] ?? ($score['S'] ?? 'N/A') }}</td>
                <td>{{ $score['ENTERPRISING'] ?? ($score['E'] ?? 'N/A') }}</td>
                <td>{{ $score['CONVENTIONAL'] ?? ($score['C'] ?? 'N/A') }}</td>
                <td>{{ \Carbon\Carbon::parse($result['created_at'])->format('Y-m-d H:i') }}</td>
                <td>{{ $result['start_time'] }}</td>
                <td>{{ $result['end_time'] }}</td>
                <td>{{ $result['difference'] }}</td>
                <td>{{ $result['event_title'] }}</td>
                <td>{{ $result['type_title'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="footer" style="position: fixed; bottom:0; width: 100%;">
    <p style="float: left;">© {{ \Carbon\Carbon::now()->format('Y') }} Psikologi Ukrida. All rights reserved.</p>
    <p style="float: right;">{{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}</p>
</div>
</body>
</html>
