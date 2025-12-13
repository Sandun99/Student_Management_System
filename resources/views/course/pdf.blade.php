<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 5pt;
            margin: 0;
            padding: 8mm 4mm 8mm 4mm;
            line-height: 1.3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1px;
            text-align: left;
            font-size: 7pt;
            white-space: normal;
        }

        th {
            border-bottom: 1px solid #000;
            font-weight: bold;
        }

        td {
            border-bottom: 1px solid #ddd;
            margin-bottom: 3px;
        }

        @page {
            margin: 0;
            size: A4 portrait;
        }

        @page :first {
            margin-top: 0;
        }

        @page {
            prince-shrink-to-fit: true;
        }
    </style>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>Course Code</th>
        <th>Course Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Duration</th>
        <th>Start Date</th>
        <th>Subjects</th>
    </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
            <td>{{ $course->code }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->category }}</td>
            <td style="width: 55px;">{{ $course->price }}</td>
            <td style="width: 60px;">{{ $course->duration }}</td>
            <td style="width: 75px;">{{ $course->start_date?->format('d M Y') }}</td>
            <td>
                @foreach($course->subjects as $subject)
                    {{ $subject->name }} ,
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
