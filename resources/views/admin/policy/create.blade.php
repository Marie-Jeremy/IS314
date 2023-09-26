@extends('layouts.master')

@section('title', 'Policy')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
        <h4 class="">Add Policy</h4>
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


    <form action="{{ url('admin/add-policy') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Policy Number</label>
             <input type="text" name="policy_number"  class="form-control" >
</div>
<div class="mb-3">
  <label for="">Policy Type</label>
  <select name="policy_type" class="form-control">
  <option value="" selected disabled hidden>Select a policy type</option>
    <option>Single Trip</option>
    <option>Annual Multi-Trip</option>
  </select>
</div>

<div class="mb-3">
  <label for="">Premium Plans</label>
  <select name="plans" class="form-control"  id="premium-plans" onchange="updateDescription()">
  <option value="" selected disabled hidden>Select a premium plans</option>
    <option>Basic</option>
    <option>Standard</option>
    <option>Premium</option>
  </select>
</div>

<div class="mb-3">
            <label for="">Premium Plans Coverage</label>
             <textarea name="description" class="form-control" id="description-label" readonly>
                
</textarea>
        </div>


        <div class="mb-3">
            <label for="">Coverage Amount</label>
            <input type="text" name="coverage_amount" placeholder="Enter coverage amount" class="form-control" onchange="calculatePremium()">
        </div>
        <div class="mb-3">
            <label for="">Premium Amount</label>
            <input type="text" name="premium_amount" id="premium_amount" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="">Policy Duration</label>
            <option value="">Classify duration in days/weeks/year</option>
            <input type="text" name="policy_duration" class="form-control">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save Policy</button>
        </div>

<script>
    function calculatePremium() {
        var coverageAmount = document.getElementsByName("coverage_amount")[0].value;
        var premiumAmount = coverageAmount * 0.1;
        document.getElementById("premium_amount").value = premiumAmount;
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