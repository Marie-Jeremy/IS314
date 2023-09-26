<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Travel Insurance Customer Report</title>
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
        .customer-info {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .customer-info h2 {
            margin-bottom: 10px;
            text-align: center;
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
        }
        .customer-info p {
            margin: 5px 0;
        }
        .customer-info p.label {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="customer-info">
        <h2>Travel Insurance Customer Report</h2>
        <p class="label">Customer ID:</p>
        <p>{{ $customers->customer_id }}</p>
        <p class="label">Name:</p>
        <p>{{ $customers->name }}</p>
        <p class="label">Username:</p>
        <p>{{ $customers->username }}</p>
        <p class="label">Gender:</p>
        <p>{{ $customers->gender }}</p>
        <p class="label">Age:</p>
        <p>{{ $customers->age }}</p>
        <p class="label">Birth Date:</p>
        <p>{{ $customers->birth_date }}</p>
        <p class="label">Marital Status:</p>
        <p>{{ $customers->marital_status }}</p>
        <p class="label">Phone:</p>
        <p>{{ $customers->phone }}</p>
        <p class="label">Email:</p>
        <p>{{ $customers->email }}</p>
        <p class="label">Address:</p>
        <p>{{ $customers->address }}</p>
        <p class="label">Password:</p>
        <p>{{ $customers->password }}</p>
        <p class="label">Policy Number:</p>
        <p>{{ $customers->policy_number }}</p>
        <p class="label">Policy Type:</p>
        <p>{{ $customers->policy_type }}</p>
        <p class="label">Premium Plan:</p>
        <p>{{ $customers->plans }}</p>
        <p class="label">Policy Description:</p>
        <p>{{ $customers->description }}</p>
    </div>
</body>
</html>
