@extends('layouts.master')

@section('title', 'Policy')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
        <h4 class="">Edit Policy</h4>
        <a href="{{ url('admin/policy') }}" class="btn btn-danger float-end">BACK</a>
</div>

<div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
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
  <select name="policy_type" class="form-control">
  <option value="Single Trip" <?php if ($policy->policy_type === 'Single Trip') echo 'selected'; ?>>Single Trip</option>
  <option value="Annual Multi-Trip" <?php if ($policy->policy_type === 'Annual Multi-Trip') echo 'selected'; ?>>Annual Multi-Trip</option>
  </select>
</div>

        <div class="mb-3">
  <label for="">Premium Plans</label>
  <select name="plans" class="form-control"  id="premium-plans" onchange="updateDescription()">
  <option value="Basic" <?php if ($policy->plans === 'Basic') echo 'selected'; ?>>Basic</option>
  <option value="Standard" <?php if ($policy->plans === 'Standard') echo 'selected'; ?>>Standard</option>
  <option value="Premium" <?php if ($policy->plans === 'Premium') echo 'selected'; ?>>Premium</option>
  </select>
</div>

     <div class="mb-3">
            <label for="">Policy Description</label>
             <textarea name="description" class="form-control" id="description-label" readonly>
             {{ $policy->description }}
</textarea>
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

<script>
function updateDescription() {
  // Get the selected premium plan
  var premiumPlan = document.getElementsByName("plans")[0].value;

  // Find the corresponding description
  var description;
  switch (premiumPlan) {
    case "Basic":
      description = "Medical expenses, Trip cancellations, Lost or stolen baggage";
      break;
    case "Standard":
      description = "Emergency medical expenses, Trip cancellations & interruptions, Travel delay";
      break;
    case "Premium":
      description = "Emergency medical expenses, Trip cancellations & interruptions, Travel delay, Accidental death & dismemberment, Rental car coverage";
      break;
    default:
      description = "";
  }

  // Set the description field value
  document.getElementById("description-label").textContent = description;
}
</script>
</form>
</div>

</div>

</div>

@endsection