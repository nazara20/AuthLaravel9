@extends('layouts.app')
@section('content')
@guest
<h1>Hello, world!</h1>

  <div class="row">
    <div class="col-md-3">
      <div class="alert alert-primary" role="alert">
        <strong>Check it out!</strong>
      </div>
    </div>
  </div>
  @else
  <h1>Hello, {{ Auth::user()->name }}</h1>

  <div class="row">
    <div class="col-md-7">
      <div class="alert alert-primary" role="alert">
        <p>Anda login sebagai {{ Auth::user()->role }}</p>
        <strong>Selamat datang di halaman Dashbboard</strong>
      </div>
    </div>
  </div>
  @endguest
@endsection