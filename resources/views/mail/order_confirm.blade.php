<body>
    
	<div class="success_box" style="border: 1px solid #ccc;text-align: center; padding: 30px;">
		<a target="_blank" href="https://event.sieindia.com/"><img src="{{ asset('assets/logo.png') }}" style="width: 134px; background:#000; padding:20px; border-radius:20px;"></a>
	@if($type == 'client')
		
        <h3 style="font-size: 25px; font-weight: 700; margin-top: 7px; margin-bottom: 0px;">Thank You. Your order status is {{$order->payment_status}}.</h3>
        <h4 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Your Transaction ID for this transaction is <b>{{$order->payment_id}}</b></h4>
        <h4 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Your Registration ID is <b>SIEINDIA{{auth()->guard('web')->user()->id}}</b></h4>
		@if($order->grand_total > 0)
	       <h5 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Payment of Rs.<b> {{$order->grand_total}}</b></h5>
	    @endif
    @endif

    @if($type == 'admin')
        <h3 style="font-size: 25px; font-weight: 700; margin-top: 7px; margin-bottom: 0px;">Doctor Name : {{$order->first_name}}</h3>
        <h4 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Order status : {{$order->payment_status}}.</h4>
        <h4 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Transaction ID : {{$order->payment_id}}.</h4>
        <h4 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Registration ID : SIEINDIA{{auth()->guard('web')->user()->id}}.</h4>
        <h4 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Payment : {{$order->grand_total}}.</h4>
		<h4 style="padding: 0px; margin: 0px; font-size: 18px; font-weight: 400; padding-top: 7px;">Coupon code : {{$order->coupon_code}}.</h4>
    @endif    
    
    <h2>Booking Information <b>({{$order->d1}})</b></h2>
		<div class="table-responsive" style="overflow-y: hidden;">
		<table class="table paddbotm20" style=" width: 100%; border: 1px solid #ccc;">
	   <tbody>
		   
           <tr>
		      <th style="border-bottom: 1px solid #ccc;"><b>Sr. No.</b></th>
			   <th style="border-bottom: 1px solid #ccc;"><b>Name</b></th>
		      <th style="border-bottom: 1px solid #ccc;"><b>Speaker</b></th>
			   <th style="border-bottom: 1px solid #ccc;"><b>Topics</b></th>
			   
		      <th style="border-bottom: 1px solid #ccc;"><b>Date</b></th>
			  <th style="border-bottom: 1px solid #ccc;"><b>Timing</b></th>
			  <th style="border-bottom: 1px solid #ccc;"><b>Amount</b></th>
		  </tr>
		   @php
		     $sr = 1;
		   @endphp
		   @foreach($order_items as $item)
		   <tr>
		      <td style="border-bottom: 1px solid #ccc;">{{$sr++}}</td>
			   <td style="border-bottom: 1px solid #ccc;">{{$item->slot_name}}</td>
			   <td style="border-bottom: 1px solid #ccc;">{{$item->speaker}}</td>
		      <td style="border-bottom: 1px solid #ccc;">{{$item->description}}</td>
		      
		      <td style="border-bottom: 1px solid #ccc;">
			  {{date('d F Y', strtotime($item->slot_date))}}, {{date('l', strtotime($item->slot_date))}}			
			</td>
			<td style="border-bottom: 1px solid #ccc;">{{$item->slot_time}}</td>
			  <td style="border-bottom: 1px solid #ccc;">₹{{$item->amount}}</td>
		      
		  </tr>
    @endforeach
		   
	      
		  
		  
		  
	   </tbody>
	</table>
    </div>
		</div>
</body>