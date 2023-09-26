@extends('layouts.master')

@section('title', 'Edit-Claim')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
        <h4 class="">Edit Claim</h4>
        <a href="{{ url('admin/claims') }}" class="btn btn-danger float-end">BACK</a>
</div>

<div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif


<form action="{{ route('claims.update', ['id' => $claim->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Customers ID</label>
             <input type="text" name="customer_id" value="{{ $claim->customer_id }}" class="form-control" readonly>
</div>
<div class="mb-3">
            <label for="">Customers Name</label>
            <input type="text" name="name" value="{{ $claim->name }}" class="form-control">
</div>

<div class="mb-3">
            <label for="">Customers Email</label>
            <input type="text" name="email" value="{{ $claim->email }}"class="form-control">
</div>
<div class="mb-3">
            <label for="">Claim Type</label>
            <input type="text" name="claim_type" value="{{ $claim->claim_type }}" class="form-control">
</div>
<div class="mb-3">
            <label for="">Claim Description</label>
             <textarea name="description" class="form-control" id="description-label">
             {{ $claim->description }}
</textarea>
</div>
        
<div class="mb-3">
                <label for="">Proof of Loss</label>
                <input type="file" name="proof_of_loss" value="{{ $claim->proof_of_loss }}" class="form-control-file">
                </div>

<div class="col-md-8">
    <button type="submit" class="btn btn-primary">Update Claim</button>
</div>

</form>
</div>

</div>

</div>

@endsection