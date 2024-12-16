@extends('admin.layouts.app') <!--, [$pageInfo]-->
@section('main.content')
<style>
table#logs {
    font-size: 14px;
}
	
table#logs td {
    vertical-align: top;
}	
	
</style>
<div class="card-body">

<div class="table-responsive">

	<table id="all-customer" class="display" style="width:100%">
        <thead>
            <tr>
				<th>SR No</th>
				<th>Registration Id</th>
				<th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>
                <th>Dci No</th>
                <th>No of Slots Booked</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
			
			@php
			$x = 1;
			@endphp
			@foreach($customer as $data)
			    @php
                    $no_slots = 0;
                    $order = DB::table('orders')->where('phone', $data->phone)->where('payment_status', 'paid')->get();
                    foreach ($order as $items) {
                        $order_items = DB::table('order_items')->where('order_id', $items->id)->get();
                        foreach ($order_items as $count) {
                            $no_slots += 1; // Increment the no_slots counter for each item
                        }
                    }
                @endphp
                
                
                <div style="display:none;" class="Booking_Info_{{$data->id}}">
					<div>
						<h3 class="text-center">Doctor Details</h3>
							<div class="row mt-3">
								<div class="col col-md-4">
									<p><b>Name :</b>  {{$data->first_name}}  {{$data->last_name}}</p>
								</div>
								<div class="col col-md-4">
									<p><b>Email :</b>  {{$data->email}}</p>
								</div>
								<div class="col col-md-4">
									<p><b>Phone :</b>  {{$data->phone}}</p>
								</div>
							</div>
						<div class="row">
							<p class="col col-md-4"><b>DCI :</b>  {{$data->dci_no}}</p>
							<p class="col col-md-4"><b>Created At :</b>  {{$data->created_at}}</p>
							<p class="col col-md-4"><b>State & City :</b>  {{$data->state}},  {{$data->city}}</p>
							<p class="col col-md-4"><b>Zipcode :</b>  {{$data->zipcode}}</p>
						</div>
					</div>
					
					
				    <hr>
				    
				    	<div>
				    		<h3 class="text-center">Booking Seats</h3>
				    			<div class="row d-flex justify-content-center">
				    			    
				    			    
			                           @php
                                        $order = DB::table('orders')->where('phone', $data->phone)->where('payment_status', 'paid')->get();
                                        foreach ($order as $items) {
                                            $order_items = DB::table('order_items')->where('order_id', $items->id)->get();
                                            foreach ($order_items as $item) { @endphp
                                               <div class="card col col col-md-4 m-1 border border-secondary border-5">
				    						        <div class="card-body">
				    						        	<p><b>Workshop :</b> {{$item->workshop}}</p>
				    						            <p><b>Name :</b> {{$item->slot_name}}</p>
				    						        	<p><b>Speaker :</b> {{$item->speaker}}</p>
				    						        	<p><b>Topics :</b> {{$item->description}}</p>
				    						        	<p><b>Date :</b> {{date('d F Y', strtotime($item->slot_date))}}, {{date('l', strtotime($item->slot_date))}}</p>
				    						        	<p><b>Time :</b> {{$item->slot_time}}</p>
				    						        	<p><b>Amount :</b> ₹{{$item->amount}}</p>
				    						        </div>
				    					        </div>
                                    @php   }
                                        }
                                        @endphp
				    				
				    			</div>
				    	</div>
					
                </div>
                
                
                
                
                
     
                
                
				<tr>
				<td>{{$x++}}</td>
				<td>
					<label>SIEINDIA{{$data->id}}</label>
				</td>
				<td>
					{{$data->first_name.''.$data->last_name}} 
				</td>
				<td>
					{{$data->email}} 
				</td>
				<td>
					{{$data->phone}} 
				</td>
				<td>
					{{$data->city}} 
				</td>
				<td>
					{{$data->state}} 
				</td>
				<td>
					{{$data->zipcode}} 
				</td>
				<td>
					{{$data->dci_no}} 
				</td>
				<td>
				    <button type="button" class="btn btn-block btn-sm btn-link order-details" data-id="{{$data->id}}" data-toggle="modal" data-						target="#exampleModalLong">
  						{{$no_slots}}
					</button>
					 
				</td>
				<td>
					{{$data->created_at}} 
				</td>
				</tr>
			@endforeach
        </tbody>
    </table>
	</div>
	 </div>  
  </div>

@endsection
