@extends('layouts.master')

@section('title', 'Upgrade Requests')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>Upgrade Requests
<a href="{{ url('admin/customers') }}" class="btn btn-primary btn-sm float-end">Edit Customers</a>
</h4>
</div>
<div class="card-body">
@if (session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<table id ="example" class="table table-boardered">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Policy Number</th>
            <th>Policy Type</th>
            <th>Premium Amount</th>
</tr>
</tr>
</thead>
<tbody>
@foreach ($upgradeRequests as $upgradeRequest)
    <tr>
        <td>{{$upgradeRequest->customer_id}}</td>
        <td>{{ $upgradeRequest->name }}</td>
        <td>{{ $upgradeRequest->email }}</td>
        <td>{{ $upgradeRequest->policy_number }}</td>
        <td>{{ $upgradeRequest->policy_type }}</td>
        <td>{{ $upgradeRequest->premium_amount }}</td>
</tr>

@endforeach
</tbody>
</table>

</div>
</div>

</div>


@endsection