<body>

    <div class="success_page padd170" style="text-align:center">
        <div class="container">
            <div class="success_box">
                <a target="_blank" href="https://event.sieindia.com/"><img src="{{ asset('assets/logo.png') }}" style="width: 134px; background:#000; padding:20px; border-radius:20px;"></a>

                <h3>Transaction failed due to : {{$errorMessage}}</h3>
                <h5>Transaction id for this transaction is <b>{{$order->payment_id}}</b></h5>
				
            </div>
        </div>
    </div>

</body>