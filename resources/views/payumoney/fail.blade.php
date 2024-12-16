@extends('web.layouts.app')

@section('main.content')
     <body>
     
		 <div class="success_page padd170">
    <div class="container">
	<div class="success_box">
	<img class="width60" src="assets/1828665.png">
  
		
	 <h3>Transaction failed due to : {{$errorMessage}}</h3>
     <h5>Your order status is <b>{{$data["status"]}}</b></h5>
     <h5>Your transaction id for this transaction is <b>{{$data["txnid"]}}</b></h5>
		
		<a class="btn btn-primary mt-4 book_new_btn" href="{{url('')}}">Back to Registration Page</a>
		 </div></div>
     </div>
		
     </body>
@endsection

@section('main.script')
<script>

</script>
@endsection