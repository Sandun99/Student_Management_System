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

@foreach($courses as $course)
    <table class="table">
        <tr>
            <th>Course Name</th>
            <td><strong>{{ $course->name }}</strong></td>
        </tr>
        <tr>
            <th>Course Code</th>
            <td>{{ $course->code }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $course->category }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>Rs. {{ number_format($course->price, 2) }}</td>
        </tr>
        <tr>
            <th>Duration</th>
            <td>{{ $course->duration }}</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{ $course->start_date?->format('d M, Y')}}</td>
        </tr>
        <tr>
            <th>Subjects</th>
            <td>
                @foreach($course->subjects as $subject)
                    {{ $subject->name }} <br>
                @endforeach
            </td>
        </tr>
    </table>
    <hr>
@endforeach
</body>
</html>
