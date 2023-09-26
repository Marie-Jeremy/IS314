@extends('layouts.master')

@section('title', 'Customers')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>View Customers
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
            <th>Email</th>
            <th>Address</th>
            <th>Policy Number</th>
            <th>Policy Type</th>
            <th>Premium Plans</th>
            <th>Policy Description</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Report</th>
</tr>
</tr>
</thead>
<tbody>
    @foreach ($customers as $item)
    <tr>
       
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->address}}</td>
        <td>{{$item->policy_number}}</td>
        <td>{{$item->policy_type}}</td>
        <td>{{$item->plans}}</td>
        <td>{{$item->description}}</td>
        <td>
            <a href="{{ url('admin/edit-customer/' .$item->id) }}" class="btn btn-success">Edit</a>
</td>
<td>
            <a href="{{ url('admin/delete-customer/' .$item->id) }}" class="btn btn-danger">Delete</a>
</td>
<td>
     <a href="{{ url('admin/generate-pdf/' .$item->id) }}" class="btn btn-primary">PDF Report</a>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>

</div>


@endsection