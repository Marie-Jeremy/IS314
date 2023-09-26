@extends('layouts.master')

@section('title', 'Add-Claims')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Claims</h4>
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


    <form action="{{ url('admin/add-claims') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Customer ID</label>
            <input type="text" name="customer_id" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Customer Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Customers Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Claim Type</label>
            <input type="text" name="claim_type" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Claim Description</label>
            <textarea name="description" class="form-control" id="description-label"></textarea>
        </div>

        <div class="mb-3">
                    <label for="">Proof of Loss</label>
                    <input type="file" name="proof_of_loss" class="form-control-file">
                </div>

        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save Claim</button>
        </div>
        
    </form>
    </div>

    </div>

</div>

@endsection