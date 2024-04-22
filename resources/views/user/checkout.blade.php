@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
   <link rel="stylesheet" href="{{ asset('css/allPages.css') }}">  
@endsection
@section('content')
<h3>Delivery Address</h3>
<form action="{{ route('order.store') }}" method="POST">
    @csrf
    <div class="userCheckoutData">
        <div class="formdata">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="Enter First Name" class="checkoutInput">
        </div>
    
        <div class="formdata">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Enter Last Name" class="checkoutInput">
        </div>
        <div class="formdata">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter email" class="checkoutInput">
        </div>
        <div class="formdata">
            <label for="Pnumber">Phone Number</label>
            <input type="number" name="pNumber" id="pNumber" placeholder="eg 0767676689" class="checkoutInput">
        </div>
      
    </div>
    
    <div class="locationData">
        <div class="l_check">
            <label for="region">Mkoa/Region</label>
            <input type="text" name="region" id="region" placeholder="Enter region" class="l_checkoutInput">
        </div>
        <div class="l_check">
            <label for="distict">District/wilaya</label>
            <input type="text" name="district" id="district" placeholder="Enter District" class="l_checkoutInput">
        </div>
        <div class="l_check">
            <label for="ward">Ward/Kata</label>
            <input type="text" name="ward" id="ward" placeholder="Enter ward" class="l_checkoutInput">
        </div>
        <div class="l_check">
            <label for="street">Street/Mtaa</label>
            <input type="text" name="street" id="street" placeholder="Enter street" class="l_checkoutInput">
        </div>

    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <button type="submit">submit</button>

</form>
    
@endsection