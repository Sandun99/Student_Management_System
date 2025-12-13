<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teachers</title>
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
            font-size: 5pt;
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

<table class="table table-bordered">
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
        <th style="width: 85px;">Subjects</th>
        <th style="width: 60px;">Grades</th>
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
            <td style="width: 85px; word-wrap: break-word; white-space: normal; line-height: 1.3;">
                @foreach($teacher->subjects as $subject)
                    {{ $subject->sub_code }} |
                @endforeach
            </td>
            <td style="width: 60px; word-wrap: break-word; white-space: normal; line-height: 1.3;">
                @foreach($teacher->grades as $grade)
                    {{ $grade->full_name }} |
                @endforeach
            </td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
