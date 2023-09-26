@extends('layouts.master')

@section('title', 'Payments Made')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>Payments Made
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
            <th>Payment Date</th>
            <th>Payment Amount</th>
</tr>
</tr>
</thead>
<tbody>
@foreach ($payments as $payment)
    <tr>
        <td>{{ $payment->customer_id}}</td>
        <td>{{ $payment->name }}</td>
        <td>{{ $payment->email }}</td>
        <td>{{ $payment->payment_date }}</td>
        <td>{{ $payment->amount }}</td>
</tr>

@endforeach
</tbody>
</table>

</div>
</div>

</div>


@endsection