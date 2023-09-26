@extends('layouts.master')

@section('title', 'View Policy')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>View Policy</h4>
</div>
<div class="card-body">
@if (session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<table class="table table-boardered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Policy Number</th>
            <th>Policy Type</th>
            <th>Coverage Amount</th>
            <th>Premium Amount</th>
            <th>Policy Duration</th>
            <th>Edit</th>
</tr>
</thead>
<tbody>
    @foreach ($policy as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->policy_number}}</td>
        <td>{{$item->policy_type}}</td>
        <td>{{$item->coverage_amount}}</td>
        <td>{{$item->premium_amount}}</td>
        <td>{{$item->policy_duration}}</td>
        <td>
            <a href="{{ url('admin/premium/' .$item->id) }}" class="btn btn-success">Edit</a>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>

</div>


@endsection