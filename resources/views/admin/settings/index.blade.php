@extends('admin.layouts.app') <!--, [$pageInfo]-->
@section('main.content')
<style>
table#all-orders {
    font-size: 14px;
}
	
table#all-orders td {
    vertical-align: top;
}	
	
</style>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong> {{ session('success') }} </strong>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> {{ session('danger') }} </strong>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="card-body">

	<form method="POST" action="{{ url('/admin/update_business_settings') }}"  >
	  @csrf
	  <div class="mb-3">
	  <label for="number_of_select_option" class="form-label">No of checkbox will select in 2 Step</label>
	  	<select class="form-select col col-md-4" name="number_of_select_option" id="number_of_select_option">
		  <option selected value=''>select number of checkbox</option>
		  <option value="1">One</option>
		  <option value="2">Two</option>
		  <option value="3">Three</option>
		  <option value="4">Four</option>
		  <option value="5">Five</option>
		</select>
	  </div>
	  <div class="mb-3">
	  <label for="number_of_select_option" class="form-label">Total Number of Orders Will be Placed</label>
	  	<select class="form-select col col-md-4" name="number_of_order" id="number_of_order">
		  <option selected value=''>select number Orders Will be Placed</option>
		  <option value="1">One</option>
		  <option value="2">Two</option>
		  <option value="3">Three</option>
		  <option value="4">Four</option>
		  <option value="5">Five</option>
		</select>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
  
</div>


<script>

	document.addEventListener('DOMContentLoaded', function() {
	  var selectOption = document.getElementById('number_of_select_option');
	  var totalOption = document.getElementById('number_of_order');
	  var optionValue = "{{ $business_settings->checkbox }}"; // Value of the option to be selected
	  var totalValue = "{{ $business_settings->number_of_order }}"; 

	  selectOption.value = optionValue;
	  totalOption.value = totalValue;
	});
	
</script>


@endsection

