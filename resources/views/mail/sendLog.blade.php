<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
        }
        .en {
            display: block;
            font-size: 12px;
            font-style: italic;
            margin: 2px 0 8px 0;
            line-height: 1.2;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-table td {
            padding: 4px 8px;
            vertical-align: top;
            text-align: left;
        }
        .checklist-table th,
        .checklist-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }
        .checklist-table th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <table class="details-table" cellspacing="0" cellpadding="0">
        <tr>
            <td><strong>First Column</strong><br><span class="en">Kolom Pertama</span></td>
            <td>:</td>
            <td>{{ $first_col }}</td>
        </tr>
        <tr>
            <td><strong>Second Column</strong><br><span class="en">Kolom Kedua</span></td>
            <td>:</td>
            <td>{{ $second_column }}</td>
        </tr>
    </table>
    <br>
    <p>[Dashboard TTMng]</p>
</body>
</html>
