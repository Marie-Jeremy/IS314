<!DOCTYPE html>
<html>
<head>
    <title>Travel Insurance Policy Report</title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>
    <h1>Travel Insurance Policy Report</h1>
    <table>
        <thead>
            <tr>
                <th>Policy Number</th>
                <th>Policy Type</th>
                <th>Policy Plans</th>
                <th>Premium Plans Coverage</th>
                <th>Coverage Amount</th>
                <th>Premium Amount</th>
                <th>Policy Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($policy as $item)
            <tr>
                <td>{{ $item->policy_number }}</td>
                <td>{{ $item->policy_type }}</td>
                <td>{{ $item->plans }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->coverage_amount }}</td>
                <td>{{ $item->premium_amount }}</td>
                <td>{{ $item->policy_duration }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
