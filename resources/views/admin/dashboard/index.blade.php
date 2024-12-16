@extends('admin.layouts.app') <!--, [$pageInfo]-->
@section('main.content')
<div class="col-md-3 col-sm-6 col-12">
	<a href="{{url(route('admin.orders'))}}">
    <div class="info-box">
	  
      <span class="info-box-icon bg-info">
        <i class="fa fa-shopping-cart"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Total Orders</span>
        <span class="info-box-number">{{$totalOrders}}</span>
      </div>
    </div>
	</a>
  </div>

  <div class="col-md-3 col-sm-6 col-12">
	  <a href="{{url(route('admin.orders').'?status=paid')}}">
    <div class="info-box">
      <span class="info-box-icon bg-success">
        <i class="fa fa-shopping-cart"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Paid Orders</span>
        <span class="info-box-number">{{$paidOrders}}</span>
      </div>
    </div>
		  </a>
  </div>
  <div class="col-md-3 col-sm-6 col-12">
	  <a href="{{url(route('admin.orders').'?status=unpaid')}}">
    <div class="info-box">
      <span class="info-box-icon bg-danger">
        <i class="fa fa-shopping-cart"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Unpaid Orders</span>
        <span class="info-box-number">{{$unpaidOrders}}</span>
      </div>
    </div>
		  </a>
  </div>
  <div class="col-md-3 col-sm-6 col-12">
	  <a href="{{url(route('admin.orders').'?status=created')}}">
    <div class="info-box">
      <span class="info-box-icon bg-warning">
        <i class="fa fa-shopping-cart"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Created Orders</span>
        <span class="info-box-number">{{$createdOrders}}</span>
      </div>
    </div>
		  </a>
  </div>
@endsection