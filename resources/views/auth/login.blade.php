@extends('layouts.review')
@section('content')
<div class=""card mx-auto mt-5"  style="max-width: 400px;">
    <div class="card-body">
        <h2 class="card-title text-center mb-4">Login </h2>
<form  method="POST" action ="{{route('login')}}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" value="{{ old('email')}}" name="email" aria-describedby="emailHelp">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="form-group">
      <label for="password" >Password</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <!-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <p></p>
    <button type="submit" class="btn btn-primary btn-black">Login</button>
  </form>
    </div>
</div>
@endsection
