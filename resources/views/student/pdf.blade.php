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

@foreach($students as $student)
    <table class="table">
        <tr>
            <th>Student Name</th>
            <td><strong>{{ $student->name }}</strong></td>
        </tr>
        <tr>
            <th>Student ID</th>
            <td>{{$student->reg_no}}</td>
        </tr>
        <tr>
            <th>Date Of Birth</th>
            <td>{{$student->dob?->format('d M, Y')}}</td>
        </tr>
        <tr>
            <th>NIC</th>
            <td>{{$student->nic}}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{$student->gender}}</td>
        </tr>
        <tr>
            <th>Phone Num</th>
            <td>{{$student->mobile}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$student->address}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$student->email}}</td>
        </tr>
        <tr>
            <th>Course</th>
            <td>
                {{ $student->course?->name }}
            </td>
        </tr>
        <tr>
            <th>Grade</th>
            <td>
                {{ $student->grade?->full_name}}
            </td>
        </tr>
    </table>
    <hr>
@endforeach
</body>
</html>
