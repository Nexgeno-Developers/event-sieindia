@extends('web.layouts.app')
@section('main.content')

<style>
    .fs-20
{
    font-size:20px;
}
.profile_box p {
    margin-bottom: 8px;
    font-size: 14px;
    color: #000;
    font-weight: normal;
}
.success_box {
    background: #fff;
    padding: 40px 0px 46px 0px !important;
    margin-top: 30px;
    border-radius: 50px;
    box-shadow: 4px 10px 10px -5px #0000000d;
}
.inner_profiles_boxex {
    padding: 0px 40px 25px;
}

.border_top {
    border-top: 1px solid #cccccc52;
}
.padding_left40
{
    padding-left:40px
}
.table_box {
    padding: 0px 40px;
}

.table_box td {
    font-size: 13px;
    font-weight: 400;
}

.table_box .table{
    border: 1px solid #ccc;
}

.table_box th {
    border-bottom: 1px solid #ccc !important;
    font-size: 14px;
}

.text_right
{
    text-align:right;
}

.table-responsive {
    overflow-x: inherit;
    -webkit-overflow-scrolling: touch;
}

 @media(max-width:767px)
 {
     .table-responsive {
    overflow-x: auto !important;
    -webkit-overflow-scrolling: touch;
}
 }
</style>


<div class="container">
	
<div class="success_box profile_box">

<div class="table-responsive">
    <div class="inner_profiles_boxex">
                <div class="row">
                     <div class="col-md-12">
                             <h3 class="mb-3 text-left fs-20"><strong> Registration No</strong> : <span class="text-danger">SIEINDIA{{auth()->guard('web')->user()->id}}</span></h3>     
                        </div>
                        
                        
                    <div class="col-md-4">
                        <p><b>Name:</b> {{$user_detail->first_name . ' ' . $user_detail->last_name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><b>Email:</b> {{$user_detail->email}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><b>Phone:</b> {{$user_detail->phone}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><b>City:</b> {{$user_detail->city}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><b>State:</b> {{$user_detail->state}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><b>Zipcode:</b> {{$user_detail->zipcode}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><b>Dci No:</b> {{$user_detail->dci_no}}</p>
                    </div>
                </div>
        </div>
        
         <div class="border_top mb-4"></div>
         
    
            <!--<div class="row">
                <div class="col-md-10">
                    <h3 class="mb-0 text-left"><strong class="text-danger"> Registration No</strong> : SIEINDIA{{auth()->guard('web')->user()->id}}</h3>                    
                </div>
                 <div class="col-md-2 d-none">
                    <div id="qecodeImg">
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqw8OmQqJgqbVKCZoZmlL02wgNuzudkUwD0eRjgDw&s" alt="Image">
                    </div>
                    <button id="printQecodeImg">Print</button>                    
                </div>              
            </div> ---> 
            
            
            <div class="table_box">
			@foreach($orders as $order)
			
				<div class="row">
			    <div class="col-md-6">
			        <p class="mb-2"> <strong>Order ID:</strong>  {{$order->id}}</p> 
			    </div>
			    
			     <div class="col-md-6">
			        <p class="mb-2 text_right"> <strong>Order Date:</strong>   {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</p>
			    </div>
			</div>
			
            	 	    @php
            			$orderItems = DB::table('order_items')->where('order_id', $order->id)->orderBy('id', 'desc')->get();
            				   $srn = 1;
            			@endphp
            			<table class="table table-striped" style="width:100%">
            			    <thead>
                                <tr>
                        	      <th class="col col-1 m-1">SR No</th>
                        	      <th class="col col-2 m-1">Name</th>
                        	      <th class="col col-2 m-1">Speaker</th>
                        	      <th class="col col-3 m-3">Topic</th>
                        	      <th class="col col-2 m-1">Date</th>
                        	      <th class="col col-2 m-1">Time</th>
                        	      <th class="col col-2 m-1">Amt</th>
                                </tr>
                            </thead>
            			    <tbody>
            			    @foreach($orderItems as $items)
            			    <tr>
            			        <td>{{$srn++}}</td>
            			        <td>{{$items->slot_name}}</td>
            			        <td> @php echo html_entity_decode($items->speaker) @endphp </td>
            			        <td>{{$items->description}}</td>
            			        <td>{{$items->slot_date}}</td>
            			        <td>{{$items->slot_time}}</td>
            			        <td>₹{{$items->amount}}</td>
            			    </tr>
            				@endforeach
            				</tbody>
            			</table>
            			
            		
            				
			@endforeach 
  </div>
	</div>

</div>
</div>

<script>
  document.getElementById("printQecodeImg").addEventListener("click", function () {
    // Get the image source from the div
    const imageSrc = document.getElementById("qecodeImg").querySelector("img").src;

    // Open a new window to display the image
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`<img src="${imageSrc}" alt="Image">`);
    printWindow.document.close();

    // Wait for the image to load before triggering the print dialog
    printWindow.onload = function () {
      printWindow.print();
      printWindow.close(); // Optional: Close the window after printing (you can keep it open if desired).
    };
  });
</script>

@endsection