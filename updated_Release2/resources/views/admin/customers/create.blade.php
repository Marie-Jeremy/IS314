@extends('layouts.master')

@section('title', 'Add-Customers')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Customer</h4>
            <a href="{{ url('admin/customers') }}" class="btn btn-danger float-end">BACK</a>
        </div>
    <div class="card-body">
        
    @if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif


    <form action="{{ url('admin/add-customer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Customer ID</label>
            <input type="text" name="customer_id" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Age</label>
            <input type="text" name="age" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Gender</label>
             <select name="gender" class="form-control">
                <option>Male</option>
                <option>Female</option>
             </select>
        </div>

        <div class="mb-3">
            <label for="">Birth Date</label>
            <input type="text" name="birth_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Marital Status</label>
             <select name="marital_status" class="form-control">
                <option>Married</option>
                <option>Single</option>
                <option>Divorced</option>
             </select>
        </div>

        <div class="mb-3">
            <label for="">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Address</label>
             <select name="address" class="form-control">
                <option>USA</option>
                <option>Australia</option>
                <option>Canada</option>
                <option>UK</option>
             </select>
        </div>

        <div class="mb-3">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control">
        </div>

        <div class="mb-3">
        <label for="policy_type">Policy Number</label>
    <select name="policy_number" id="policy_number" class="form-control" required>
      <option value="">Select Policy Number</option>
      @foreach($policy as $policy_number)
        <option value="{{ $policy_number->policy_number }}">{{ $policy_number->policy_number }}</option>
      @endforeach
    </select>
        </div>

        <div class="mb-3">
  <label for="">Policy Type</label>
  <select name="policy_type" class="form-control">
  <option value="" selected disabled hidden>Select a policy type</option>
  @foreach($policy as $policy_type)
  <option value="{{ $policy_type->policy_type }}">{{ $policy_type->policy_type }}</option>
  @endforeach
  </select>
</div>
        <div class="mb-3">
  <label for="">Premium Plans</label>
  <select name="plans" class="form-control"  id="premium-plans" onchange="updateDescription()">
  <option value="" selected disabled hidden>Select a premium plans</option>
  @foreach($policy as $plans)
  <option value="{{ $plans->plans }}">{{ $plans->plans }}</option>
  @endforeach
  </select>
</div>

        <div class="mb-3">
            <label for="">Policy Description</label>
             <textarea name="description" class="form-control" id="description-label" readonly>
                
</textarea>
        </div>

        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save Customer</button>
        </div>

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