@extends('layouts.master')

@section('title', 'Claims')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>View Claims
<a href="{{ url('admin/add-claims') }}" class="btn btn-primary btn-sm float-end">Add Claims</a>
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
            <th>Claim Type</th>
            <th>Claim Description</th>
            <th>Proof of Loss</th>
            <th>Update Status</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Report</th>
</tr>
</tr>
</thead>
<tbody>
    @foreach ($claims as $item)
    <tr>
        <td>{{$item->customer_id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->claim_type}}</td>
        <td>{{$item->description}}</td>
        <td>
         <a href="{{ asset('storage/proof_of_loss/' . $item->proof_of_loss_path) }}" class="btn btn-primary"
            target="_blank">View File</a>
        </td>
        <td>
        <form action="{{ route('claims.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="status" onchange="this.form.submit()" class="form-control">
        <option value="Pending" @if ($item->status == 'Pending') selected @endif>Pending</option>
        <option value="Approved" @if ($item->status == 'Approved') selected @endif>Approved</option>
        <option value="Rejected" @if ($item->status == 'Rejected') selected @endif>Rejected</option>
        </select>
        </form>
        </td>
        <td>
            <a href="{{ url('admin/edit-claim/' .$item->id) }}" class="btn btn-success">Edit</a>
</td>
<td>
            <a href="{{ url('admin/delete-claim/' .$item->id) }}" class="btn btn-danger">Delete</a>
</td>
<td>
     <a href="{{ url('admin/claims.generate-pdf/' .$item->id) }}" class="btn btn-primary">PDF Report</a>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>

</div>


@endsection