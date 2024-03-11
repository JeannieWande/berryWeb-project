@extends('admin/master')
@section('title', 'admin')
@section('content')
<h1>WELCOME TO THE ADMIN HOME PAGE!</h1>
  @push('styles')
       <link rel="stylesheet" href="{{ asset('css/admindash.css') }}">
  @endpush
@endsection