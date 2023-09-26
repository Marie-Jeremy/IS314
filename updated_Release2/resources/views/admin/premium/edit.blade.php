@extends('layouts.master')

@section('title', 'Policy')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
        <h4 class="">Edit Policy</h4>
        <a href="{{ url('admin/premium') }}" class="btn btn-danger float-end">BACK</a>
</div>

<div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
<div>({$error})</div>
@endforeach
</div>
@endif

    <form action="{{ url('admin/update-policy/' .$policy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Policy Number</label>
             <input type="text" name="policy_number" value="{{ $policy->policy_number }}" class="form-control" readonly>
</div>
<div class="mb-3">
            <label for="">Policy Type</label>
            <input type="text" name="policy_type" value="{{ $policy->policy_type }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
  <label for="">Description</label>
  <input type="text" name="description" value="{{ $policy->description }}" class="form-control" readonly>
</div>
        
<div class="mb-3">
            <label for="">Coverage Amount</label>
            <input type="text" name="coverage_amount" value="{{ $policy->coverage_amount }}" class="form-control" onchange="calculatePremium()">
</div>
<div class="mb-3">
            <label for="">Premium Amount</label>
            <input type="text" name="premium_amount" value="{{ $policy->premium_amount }}"class="form-control" readonly>
</div>
<div class="mb-3">
            <label for="">Policy Duration</label>
            <input type="text" name="policy_duration" value="{{ $policy->policy_duration }}"class="form-control">
</div>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Update Policy</button>
</div>

<script>
    function calculatePremium() {
        let coverageAmount = document.getElementsByName('coverage_amount')[0].value;
        let premiumAmount = coverageAmount * 0.1;
        document.getElementsByName('premium_amount')[0].value = premiumAmount;
    }
</script>

</form>
</div>

</div>

</div>

@endsection