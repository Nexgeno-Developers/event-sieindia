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

<div class="table-responsive">
	<button class="btn btn-success float-end mb-2" onclick="open_add_modal()"><i class="fas fa-plus" aria-hidden="true"></i>  Add Coupon</button>
	<table id="all-coupons" class="display" style="width:100%">
        <thead>
            <tr>
				<th>SR No</th>
				<th>Coupons Code</th>
				<th>Is Used</th>
				<!--<th>Date</th>-->
                <!--<th>Action</th>-->
            </tr>
        </thead>
        <tbody>

			@php
			$x = 1;
			@endphp
			@foreach($coupons as $data)
				<tr>
				<td>{{$x++}}</td>
				<td>
					{{$data->code}}
				</td>
				<td>
					@if($data->is_used == 1)
						<h4><span class="badge bg-success">Yes</span></h4>
					@else
						<h4><span class="badge bg-danger">No</span></h4>
					@endif
				</td>
				{{--<td>{{$data->created_at	}}</td>--}}
				<!--<td>
					{{--<button class="btn btn-danger" onclick="confirmDelete(event)"><i class="fas fa-trash" aria-hidden="true"></i>
						<form id="deleteForm" action="{{ route('admin.delete_coupon', ['id' => $data->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
						    @csrf
						    @method('DELETE')
						</form>
					</button>--}}
				</td> -->
			@endforeach
        </tbody>
    </table>

	<!-- Modal -->
	<div class="modal fade" id="add_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Add Coupon</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
		<form method="POST" action="{{ url('/admin/add_coupon') }}">
			@csrf
			<input type ="hidden" name="coupon_start" value="SIE-" >

		  	<label for="coupon_code" class="form-label">Coupon Code</label>
			<div class="row">
			<label class="form-label col col-1">SIE-</label>
				<input type="text" name="coupon_code" class="form-control col col-11" id="coupon_code">
			</div>
    		<label for="coupon_type" class="form-label">Coupon Type</label>
            <div class="row">
                <select name="coupon_type" class="form-control col col-11" id="coupon_type" required>
                    <option value="Advanced">Advanced</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">submit</button>
	      </div>
		</form>
	    </div>
	  </div>
	</div>
	<!-- Modal -->

	</div>
	 </div>
  </div>

  <script>

	function open_add_modal(){
		$('#add_modal').modal('toggle');
	}

	function confirmDelete(event) {
        event.preventDefault(); // Prevent the default form submission

        if (confirm('Are you sure you want to delete this Coupon?')) {
            // Submit the form
            document.getElementById('deleteForm').submit();
        }
    }

  </script>

@endsection

