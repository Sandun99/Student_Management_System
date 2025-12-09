<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Students</title>
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
            padding: 4px 3px;
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
        <th>ID</th>
        <th>Name</th>
        <th>NIC</th>
        <th>DOB</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Address</th>
{{--        <th>Subjects</th>--}}
{{--        <th>Grades</th>--}}
    </tr>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->t_id }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->nic }}</td>
            <td>{{ $teacher->dob?->format('d M Y') }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->gender}}</td>
            <td>{{ $teacher->mobile }}</td>
            <td>{{ $teacher->address }}</td>
{{--            @foreach($teacher->subjects as $subject)--}}
{{--                <td>--}}
{{--                    {{ $subject->sub_code }}--}}
{{--                </td>--}}
{{--            @endforeach--}}
{{--            @foreach($teacher->grades as $grade)--}}
{{--                <td>--}}
{{--                    {{ $grade->full_name }}--}}
{{--                </td>--}}
{{--            @endforeach--}}
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
