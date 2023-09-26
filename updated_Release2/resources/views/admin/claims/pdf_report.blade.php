<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Travel Insurance Claim Report</title>
    <style>
        body {
            font-size: 12pt;
            font-family: Arial, sans-serif;
            color: #555;
        }
        h1 {
            font-size: 18pt;
            font-weight: bold;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #eee;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .claim-info {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .claim-info h2 {
            margin-bottom: 10px;
            text-align: center;
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
        }
        .claim-info p {
            margin: 5px 0;
        }
        .claim-info p.label {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="claim-info">
        <h2>Travel Insurance Claim Report</h2>
        <p class="label">Customer ID:</p>
        <p>{{ $claim->customer_id }}</p>
        <p class="label">Name:</p>
        <p>{{ $claim->name }}</p>
        <p class="label">Email:</p>
        <p>{{ $claim->email }}</p>
        <p class="label">Claim Type:</p>
        <p>{{ $claim->claim_type }}</p>
        <p class="label">Claim Description:</p>
        <p>{{ $claim->description }}</p>
        <p class="label">Claim Status:</p>
        <p>{{ $claim->status }}</p>
    </div>
</body>
</html>
