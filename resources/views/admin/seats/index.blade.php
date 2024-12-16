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
      <!--{{var_dump($orders)}}-->

<div class="table-responsive">

	<table id="all-orders1" class="display all-seats" style="width:100%">
        <thead>
            <tr>
				<th>SR No</th>
				<th>Workshop No</th>
				<th>Slot Name</th>
                <th>Slot Time</th>
				<th>Slot Price</th>
				<th>Slot Date</th>
				<th>Speaker</th>
				<th>Available Seats</th>
				<th>Booked Seats</th>
				<th>Total Seats</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
			
			@php
			$x = 1;
			@endphp
			@foreach($orders as $seat)
				@php
					$booked_seats = DB::table('order_items')->join('orders','orders.id', '=', 'order_items.order_id')->where('orders.payment_status','paid')->where('order_items.slot_id', $seat->id )->count();
			
			        $user = DB::table('order_items')->join('orders','orders.id', '=', 'order_items.order_id')->where('orders.payment_status','paid')->where('order_items.slot_id', $seat->id )->select('orders.phone')->get();
			        
				$total_seats = $seat->slot_seats + $booked_seats;
				@endphp
				
				<div style="display:none;" class="Booking_Info_{{$seat->id}}">
				    <div>
				        <h3 class="text-center">Doctors Info</h3>
				        	<div class="row d-flex justify-content-center">
			                    @foreach ($user as $data)
                                    @php
                                        $user_details = DB::table('users')->where('phone', $data->phone)->first();
                                    @endphp
                                
                                    <div class="card col col-md-4 m-1 border border-secondary border-5">
                                        <div class="card-body">
                                            <p><b>Name:</b> {{ $user_details->first_name . ' ' . $user_details->last_name }}</p>
                                            <p><b>Email:</b> {{ $user_details->email }}</p>
                                            <p><b>Phone:</b> {{ $user_details->phone }}</p>
                                            <p><b>City:</b> {{ $user_details->city }}</p>
                                            <p><b>State:</b> {{ $user_details->state }}</p>
                                            <p><b>Zipcode:</b> {{ $user_details->zipcode }}</p>
                                            <p><b>DCI No:</b> {{ $user_details->dci_no }}</p>
                                        </div>
                                    </div>
                                @endforeach
				            </div>
				    </div>
				</div>
				
				
				<tr>
				<td>{{$x++}}</td>
				<td>
					{{$seat->workshop}}
				</td>
				<td>
					{{$seat->slot_name}} 
				</td>
                <td>
					 {{$seat->slot_time}} 
				</td>
				<td>
					 {{$seat->slot_price}}
				</td>
				<td> 
					{{$seat->slot_date}}
				</td>
				<td>
					 {{$seat->speaker}}		
				</td>
				<td>
					{{$seat->slot_seats}}
				</td>
				<td>
				    <button type="button" class="btn btn-block btn-sm btn-link order-details" data-id="{{$seat->id}}" data-toggle="modal" data-						target="#exampleModalLong">
  						{{$booked_seats}}
					</button>
				</td>
				
				<td>{{$total_seats}}</td>

				<td><button class="btn btn-success" onclick="open_add_modal({{$seat->id}});">Manage</button></td>
			@endforeach
        </tbody>
    </table>
	
	<!-- Modal -->
	<div class="modal fade" id="add_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Manage Seats</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
		<form method="POST" action="{{ url('/admin/add_seats') }}">
			@csrf
			<input type ="hidden" name="id" id="record_id">
				
		  	<label for="number_of_seats" class="form-label">Seats</label>
    		<input type="number" name="number_of_seats" class="form-control" id="number_of_seats">
				
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

	function open_add_modal(id){
		
		$('#record_id').val(id);

		$('#add_modal').modal('toggle');
	}

  </script>

@endsection

