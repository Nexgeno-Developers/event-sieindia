@extends('web.layouts.app')
@section('main.content')


  <!-- Login Page -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Sign up</h4>
          </div>
          @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
          	<strong><i class="fa fa-exclamation-triangle"></i> {{ session('danger') }} </strong>
          	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
          <div class="card-body">
            <form action="{{ route('sendOTP') }}" method="POST">
              @csrf
              <div class="form-group m-3">
                <label class="m-1" for="phone">Username</label>
                <input type="text" minlength="4" class="form-control" id="username" name="username" placeholder="Enter your Username">
              </div>
              <div class="form-group m-3">
                <label class="m-1" for="phone">Phone Number</label>
                <input type="text" minlength="10" maxlength="10" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Continue</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection