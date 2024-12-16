@extends('web.layouts.app')
@section('main.content')


  <!-- Login Page -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">verify otp</h4>
          </div>
          @if (session('danger'))
              <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
          	<strong><i class="fa fa-exclamation-triangle"></i> {{ session('danger') }} </strong>
          	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
          <div class="card-body">
            <form action="{{ route('verifyOTP') }}" method="POST">
              @csrf
              <label class="m-1" for="phone">OTP</label>
              <input type="text" minlength="6" maxlength="6" class="form-control" name="otp" placeholder="Enter OTP">
              <button type="submit" class="btn btn-primary btn-block my-2">Verify OTP</button>
            </form>
          </div>
          <div class="align-self-center" style="width: 10rem;">
            <a class="text-decoration-none" href="@if(request()->get('link') == 'signin'){{ route('signin') }}@else{{ route('signup') }}@endif">Change Number</a>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection