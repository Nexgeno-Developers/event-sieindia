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
  <div class="card">
	  <div class="card-header"> 		  
		<form action="">
			<div class="row">
				  <div class="col-md-8 form-group">
					<label for="status">Order status</label>
					<select class="form-select" id="status" name="status">
					  <option value=""  @if( Request::get('status') == '' ) selected @endif>All Orders</option>
					  <option value="paid" @if( Request::get('status') == 'paid' ) selected @endif>Paid Orders</option>
					  <option value="unpaid" @if( Request::get('status') == 'unpaid' ) selected @endif>Unpaid Orders</option>
					  <option value="created" @if( Request::get('status') == 'created' ) selected @endif>Created Orders</option>
					</select>
				  </div>
			 <div class="col-md-2">
				 <button type="submit" class="btn btn-block btn-primary" style="margin-top:2rem;">Filter</button>
				</div>
			 <div class="col-md-2">
				<a href="{{URL('admin/orders')}}" class="btn btn-block btn-danger" style="margin-top:2rem;">Reset</a>
				</div>					
					
			
			</div>
		</form>
	  </div>
	  
	  <div class="card-body">
      <!--{{var_dump($orders)}}-->

<div class="table-responsive">
<table id="all-orders" class="display" style="width:100%">
        <thead>
            <tr>
				<th>SR No</th>
				<th>Reg No</th>
                <th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>DCI</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
                <th style="display:none;">Booking Info</th>
                <th>Total Amt (Rs)</th>
                <th>Payment Id</th>
				<th>Coupon</th>
                <th>Order Status</th>
                <th>Created At</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
			@php
			$x = 1;
			@endphp
			@foreach($orders as $order)
			
			<div style="display:none;" class="Booking_Info_{{$order->id}}">
					<div>
						<h3 class="text-center">Doctor Details</h3>
							<div class="row mt-3">
								<div class="col col-md-4">
									<p><b>Name :</b>  {{$order->first_name}}  {{$order->last_name}}</p>
								</div>
								<div class="col col-md-4">
									<p><b>Email :</b>  {{$order->email}}</p>
								</div>
								<div class="col col-md-4">
									<p><b>Phone :</b>  {{$order->phone}}</p>
								</div>
							</div>
						<div class="row">
							<p class="col col-md-4"><b>DCI :</b>  {{$order->dci_no}}</p>
							<p class="col col-md-4"><b>Created At :</b>  {{$order->created_at}}</p>
							<p class="col col-md-4"><b>State & City :</b>  {{$order->state}},  {{$order->city}}</p>
							<p class="col col-md-4"><b>Zipcode :</b>  {{$order->zipcode}}</p>
						</div>

						<div class="row">
							
							<p class="col col-md-4"><b>Total Amount :</b>  ₹{{$order->grand_total}}</p>
							<p class="col col-md-4"><b>PaymentId :</b>  {{$order->payment_id}}</p>
							<p class="col col-md-4"><b>Coupon :</b>  {{$order->coupon_code}}</p>
							<p class="col col-md-4"><b>Order Status : </b>  {{$order->payment_status}}</p>
						</div>

					</div>

				<hr>
				
					<div>
						<h3 class="text-center">Booking Info</h3>
							<div class="row d-flex justify-content-center">
								
								@php
								$orderItems = DB::table('order_items')->where('order_id', $order->id)->orderBy('id', 'desc')->get();
								@endphp
								@foreach($orderItems as $item)
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
							

								@endforeach
							</div>
					</div>
		
			</div>
			
            <tr>
				<td>{{$x++}}</td>
				<td>
					@if($order->payment_status == 'paid' )
				    	 SIEINDIA{{DB::table('users')->where('phone', $order->phone)->first()->id}}
					@endif
				</td>
                <td>
					 {{$order->first_name}} {{$order->last_name}}
				</td>
				<td>
					 {{$order->email}}
				</td>
				<td> 
					{{$order->phone}}
				</td>
				<td>
					 {{$order->dci_no}}		
				</td>
				<td>
					{{$order->city}}
				</td>
				<td>
					{{$order->state}}
				</td>
				<td>
					{{$order->zipcode}}
				</td>				
               <td style="font-size: 12px;display:none;">
				
	 	    @php
			$orderItems = DB::table('order_items')->where('order_id', $order->id)->orderBy('id', 'desc')->get();
				   $srn = 1;
			@endphp
				
				@foreach($orderItems as $items)
				    Sr: {{$srn++}}, Workshop: {{$items->workshop}}, Name: {{$items->slot_name}}, Speaker: {{$items->speaker}}, Topic: {{$items->description}}, Date: {{$items->slot_date}}, Time: {{$items->slot_time}}, Amt: {{$items->amount}} ||
				@endforeach
				</td>
                <td>{{$order->grand_total}}</td>
                <td>{{$order->payment_id}}</td>
				<td>{{$order->coupon_code}}</td>
				@if($order->payment_status == 'paid' )
					<td><span class="badge badge-success p-1"> {{$order->payment_status}} </span></td>
				@elseif($order->payment_status == 'unpaid' )
					<td><span class="badge badge-danger p-1"> {{$order->payment_status}} </span></td>
				@else
					<td><span class="badge badge-primary p-1"> {{$order->payment_status}} </span></td>
				@endif
                <td>{{$order->created_at}}</td>
				<td>
					
					<button type="button" class="btn btn-block btn-sm btn-primary order-details" data-id="{{$order->id}}" data-toggle="modal" data-						target="#exampleModalLong">
  						View
					</button>
					
				</td>
            </tr>
			@endforeach 
        </tbody>
    </table>	  
	</div>
	 </div>  
  </div>
@endsection
