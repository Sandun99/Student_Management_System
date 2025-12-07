<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        h1 {
            font-size: 18pt;
            text-align: center;
            margin-bottom: 5px;
            font-weight: normal;
        }

        table {
            margin-top: 20px;
        }

        th {
            background-color: #f0f0f0;
            padding: 10px 12px;
            text-align: left;
            font-weight: bold;
            font-size: 12pt;
        }

        td {
            padding: 8px 12px;
            vertical-align: top;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>{{ $title }}</h1>
<h3>{{ $date }}</h3>

@foreach($teachers as $teacher)
    <table class="table">
        <tr>
            <th>Teacher Name</th>
            <td><strong>{{$teacher->name}}</strong></td>
        </tr>
        <tr>
            <th>Teacher ID</th>
            <td>{{$teacher->t_id}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$teacher->email}}</td>
        </tr>
        <tr>
            <th>NIC</th>
            <td>{{$teacher->nic}}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{{$teacher->dob?->format('d M, Y')}}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{$teacher->gender}}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{$teacher->mobile}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$teacher->address}}</td>
        </tr>
        <tr>
            <th>Grade</th>
            <td>
                @foreach($teacher->grades as $grade)
                    {{ $grade->full_name }} |
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Subject</th>
            <td>
                @foreach($teacher->subjects as $subject)
                    {{ $subject->name }} <br>
                @endforeach
            </td>
        </tr>
    </table>
    <hr>
@endforeach
</body>
</html>
