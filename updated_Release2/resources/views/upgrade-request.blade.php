@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid px-4">
<div class="card mt-4">
<div class="card-header">
            <h4 class="">Request Upgrade</h4>
            <a href="{{ url('user_home') }}" class="btn btn-danger float-end">BACK</a>
        </div>

<div class="card-body">
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form method="POST" action="{{ route('customer.upgradeRequest') }}">
    @csrf
    <div class="mb-3">
            <label for="">ID</label>
             <input type="text" name="customer_id" value="{{ $customer->customer_id }}" class="form-control" readonly>
</div>

    <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" class="form-control" readonly>
</div>

<div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" value="{{ $customer->email }}"class="form-control" readonly>
</div>

    <div class="mb-3">
  <label for="">Policy Number</label>
  <select name="policy_number" class="form-control">
    @foreach($policy as $policy_number)
      <option value="{{ $policy_number->policy_number }}" <?php if ($customer->policy_number === $policy_number->policy_number) echo 'selected'; ?>>
        {{ $policy_number->policy_number }}
      </option>
    @endforeach
  </select>
</div>

    <div class="mb-3">
  <label for="">Policy Type</label>
  <select name="policy_type" class="form-control">
    @foreach($policy as $policy_type)
      <option value="{{ $policy_type->policy_type }}" <?php if ($customer->policy_type === $policy_type->policy_type) echo 'selected'; ?>>
        {{ $policy_type->policy_type }}
      </option>
    @endforeach
  </select>
</div>

<div class="mb-3">
    <label for="">Premium Amount</label>
    <select name="premium_amount" class="form-control">
        <?php
            $selectedPremiumAmount = 0;
            foreach ($policy as $policyItem) {
                if ($policyItem->policy_number === $customer->policy_number) {
                    $selectedPremiumAmount = $policyItem->premium_amount;
                    break;
                }
            }
        ?>
        <option value="{{ $selectedPremiumAmount }}" selected>{{ $selectedPremiumAmount }}</option>
        @foreach($policy as $policyItem)
            @if($policyItem->premium_amount !== $selectedPremiumAmount)
                <option value="{{ $policyItem->premium_amount }}">{{ $policyItem->premium_amount }}</option>
            @endif
        @endforeach
    </select>
</div>

    <div class="mb-3">
  <label for="">Premium Plans</label>
  <select name="plans" class="form-control"  id="premium-plans" onchange="updateDescription()">
    @foreach($policy as $plans)
      <option value="{{ $plans->plans }}" <?php if ($customer->plans === $plans->plans) echo 'selected'; ?>>
        {{ $plans->plans }}
      </option>
    @endforeach
  </select>
</div>

    <div class="col-md-8">
    <button type="submit" class="btn btn-primary">Request Upgrade</button>
</div>

</form>
</div>
</div>
</div>
<div class="container-fluid px-4">
    <div class="card mt-4">
   <div class="card-header">
<h4>Available Policies to Upgrade to</h4>
</div>
<div class="card-body">
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
        </tr>
@endforeach
</tbody>
</table>
</div>
</div>


@endsection
