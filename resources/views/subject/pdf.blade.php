<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11pt;
            color: #000;
            margin: 40px 50px;
        }

        h1 {
            font-size: 18pt;
            text-align: center;
            margin-bottom: 5px;
            font-weight: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f0f0f0;
            padding: 10px 12px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #333;
            font-size: 12pt;
        }

        td {
            padding: 8px 12px;
            border: 1px solid #999;
            vertical-align: top;
        }

        td:first-child {
            width: 120px;
            font-weight: bold;
            font-family: "Courier New", monospace;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }
    </style>
</head>
<body>

<h1>{{ $title }}</h1>
<h3>{{ $date }}</h3>

<table>
    <thead>
    <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->sub_code }}</td>
            <td>{{ $subject->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
