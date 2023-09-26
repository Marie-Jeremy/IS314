@extends('layouts.master')

@section('title', 'Edit-Customers')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
        <h4 class="">Edit Customer</h4>
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


    <form action="{{ url('admin/update-customer/' .$customers->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">ID</label>
             <input type="text" name="customer_id" value="{{ $customers->customer_id }}" class="form-control" readonly>
</div>
<div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $customers->name }}" class="form-control">
</div>
<div class="mb-3">
            <label for="">Username</label>
            <input type="text" name="username" value="{{ $customers->username }}" class="form-control">
</div>
<div class="mb-3">
            <label for="">Age</label>
            <input type="text" name="age" value="{{ $customers->age }}" class="form-control">
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
            <input type="text" name="birth_date" value="{{ $customers->birth_date }}"class="form-control">
</div>
 <div class="mb-3">
            <label for="">Marital Status</label>
             <select name="marital_status" value="{{ $customers->marital_status }}" class="form-control">
                <option>Married</option>
                <option>Single</option>
                <option>Divorced</option>
             </select>
        </div>
<div class="mb-3">
            <label for="">Phone</label>
            <input type="text" name="phone" value="{{ $customers->phone }}"class="form-control">
</div>
<div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" value="{{ $customers->email }}"class="form-control">
</div>
<div class="mb-3">
            <label for="">Address</label>
             <select name="address"  value="{{ $customers->address }}" class="form-control">
             <option value="USA" <?php if ($customers->address === 'USA') echo 'selected'; ?>>USA</option>
             <option value="Australia" <?php if ($customers->address === 'Australia') echo 'selected'; ?>>Australia</option>
             <option value="Canada" <?php if ($customers->address === 'Canada') echo 'selected'; ?>>Canada</option>
             <option value="UK" <?php if ($customers->address === 'UK') echo 'selected'; ?>>UK</option>
             </select>
        </div>
<div class="mb-3">
            <label for="">Password</label>
            <input type="text" name="password" value="{{ $customers->password }}"class="form-control">
</div>
<div class="mb-3">
  <label for="">Policy Number</label>
  <select name="policy_number" class="form-control">
    @foreach($policy as $policy_number)
      <option value="{{ $policy_number->policy_number }}" <?php if ($customers->policy_number === $policy_number->policy_number) echo 'selected'; ?>>
        {{ $policy_number->policy_number }}
      </option>
    @endforeach
  </select>
</div>

        <div class="mb-3">
  <label for="">Policy Type</label>
  <select name="policy_type" class="form-control">
    @foreach($policy as $policy_type)
      <option value="{{ $policy_type->policy_type }}" <?php if ($customers->policy_type === $policy_type->policy_type) echo 'selected'; ?>>
        {{ $policy_type->policy_type }}
      </option>
    @endforeach
  </select>
</div>

        <div class="mb-3">
  <label for="">Premium Plans</label>
  <select name="plans" class="form-control"  id="premium-plans" onchange="updateDescription()">
    @foreach($policy as $plans)
      <option value="{{ $plans->plans }}" <?php if ($customers->plans === $plans->plans) echo 'selected'; ?>>
        {{ $plans->plans }}
      </option>
    @endforeach
  </select>
</div>
        <div class="mb-3">
            <label for="">Policy Description</label>
             <textarea name="description" class="form-control" id="description-label" readonly>
             {{ $customers->description }}
</textarea>
        </div>

<div class="col-md-8">
    <button type="submit" class="btn btn-primary">Update Customer</button>
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