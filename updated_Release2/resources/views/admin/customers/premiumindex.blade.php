@extends('layouts.master')

@section('title', 'Customers')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>View Get-Premium Customers
<a href="{{ url('admin/add-customer') }}" class="btn btn-primary btn-sm float-end">Add Customers</a>
</h4>
</div>
<div class="card-body">
@if (session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<table id ="example" class="table table-boardered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>Marital Status</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Policy Type</th>
            <th>Premium Plan</th>
            <th>Policy Duration</th>
            <th>Travel Destination</th>
</tr>
</tr>
</thead>
<tbody>
    @foreach ($get_premium as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->age}}</td>
        <td>{{$item->gender}}</td>
        <td>{{$item->birth_date}}</td>
        <td>{{$item->marital_status}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->address}}</td>
        <td>{{$item->policy_type}}</td>
        <td>{{$item->plans}}</td>
        <td>{{$item->policy_duration}}</td>
        <td>{{$item->destination}}</td>
</tr>

@endforeach
</tbody>
</table>

</div>
</div>

</div>


@endsection