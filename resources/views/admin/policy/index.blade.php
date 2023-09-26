@extends('layouts.master')

@section('title', 'Policy')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>View Policy
    <a href="{{ url('admin/add-policy') }}" class="btn btn-primary btn-sm float-end">Add Policy</a>
    <a href="{{ url('admin/generate-pdf/') }}" class="btn btn-info btn-sm float-end">PDF Report</a>
</h4>
</div>
<div class="card-body">
@if (session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<table  id ="example" class="table table-boardered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Policy Number</th>
            <th>Policy Type</th>
            <th>Premium Plan</th>
            <th>Premium Plans Coverage</th>
            <th>Coverage Amount</th>
            <th>Premium Amount</th>
            <th>Policy Duration</th>
            <th>Edit</th>
            <th>Delete</th>
</tr>
</thead>
<tbody>
    @foreach ($policy as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->policy_number}}</td>
        <td>{{$item->policy_type}}</td>
        <td>{{$item->plans}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->coverage_amount}}</td>
        <td>{{$item->premium_amount}}</td>
        <td>{{$item->policy_duration}}</td>
        <td>
            <a href="{{ url('admin/edit-policy/' .$item->id) }}" class="btn btn-success">Edit</a>
</td>
<td>
            <a href="{{ url('admin/delete-policy/' .$item->id) }}" class="btn btn-danger">Delete</a>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>

</div>


@endsection