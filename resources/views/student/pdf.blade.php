<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Students</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9pt;
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
            font-size: 9pt;
            white-space: nowrap;
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
        <th>Reg No</th>
        <th>Name</th>
        <th>DOB</th>
        <th>NIC</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Course</th>
        <th>Grade</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->reg_no }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->dob?->format('d M Y') }}</td>
            <td>{{ $student->nic }}</td>
            <td>{{ $student->gender}}</td>
            <td>{{ $student->mobile }}</td>
            <td>{{ $student->course?->name }}</td>
            <td>{{ $student->grade?->full_name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
