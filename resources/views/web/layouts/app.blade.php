<!DOCTYPE html>
<html lang="en">
<head>
  @include('web.layouts.components.meta')
  @include('web.layouts.components.stylesheets')
	
	<style>
	    .dropdown-toggle::after {
    display: inline-block;
    margin-left: 0.255em;
    vertical-align: 0.255em;
    content: "";
    border-top: 0.3em solid;
    border-right: 0.3em solid transparent;
    border-bottom: 0;
    border-left: 0.3em solid transparent;
    position: absolute;
    right: 8px;
    bottom: 17px;
}
.login_buttons button {
    width: auto !important;
    padding-right: 22px;
}
.login_buttons {
    float: right;
}
.fs-14
{
    font-size:14px;
}
	</style>
</head>

<body>
	
	<header>
	  <div class="container">
		  <div class="header_box">
			  <div class="row">
				  <div class="col-md-8">
				 <a href="{{url('')}}">
				  <img class="header_image2" src="https://event.sieindia.com/public/assets/final_logoevents.png">
				  </a>
					  </div>
				  <div class="col-md-4">
					  <div class="header_events">
				      
				      @if( strtotime(date('Y-m-d H:i:s')) <= strtotime('2023-08-02 23:59:59')){
				        <p>Regular Offer: ₹15900/- <span>16<sup></sup> October  to 31<sup></sup> December </span></p>
				      @else
				        <p>Night owl Offer: ₹16900/- <span>1<sup>st</sup> January onwards</span></p>
				      @endif 
						  </div>
						  
						  
					  @if( isset(auth()->guard('web')->user()->id) && !empty(auth()->guard('web')->user()->id) )
                        <div class="dropdown login_buttons pt-3">
                          <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="fw-bolder text-white col col-12 mb-0 fs-14">Welcome, {{ auth()->guard('web')->user()->first_name }} </p>
                          </button>
                             <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                               <li><a class="dropdown-item" href="{{route('view_orders')}}">View Booking</a></li>
                               <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                             </ul>
                        </div>					  
					  @else
				    	  <a class="btn btn-success" href="{{ route('login') }}">Login</a>
					  @endif						  

					         </div>

					  
				  </div>
			 </div>
		  </div>
	  </div>
	
	</header>
	
	
  @yield('main.content')
  @include('web.layouts.components.scripts')
  @include('web.layouts.components.scripts_c')
  @yield('main.script')
	
	<footer>
	    <div class="container">
			<div class="row">
               <div class="col-md-12 text-center">
			   </div>
				
				
				<div class="col-md-4">
				       <h4>About Us</h4>
						<p>1st Style Italiano Endodontics International Conference in India. Euro Dental Academie in 
							association with Style Italiano Endodontics (SIE), the largest group of dentists with its 200K+ 
							members have the honour to host this mega conference.
						</p>
					   <div class="social_media">
							<h4>Social Link</h4>
						   <ul>
								<li><a target="_blank" href="https://www.instagram.com/sieindia.com/?igshid=NTdlMDg3MTY="><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a target="_blank" href="https://www.facebook.com/SIEINDIA2023"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					
				</div>
				
				<div class="col-md-5">
				       <h4>Terms & Conditions</h4>
						<ul>
					       <li>Each participant will get to attend 1 hands-on workshop – on a first come basis.</li>
							<li>Additional hands-on is available as per the mentioned charges.</li>
							<li>To get your desired Hands-on workshops, block your slots asap as the seats are limited.</li>
							<li>Registration is confirmed only on payment of 100% fees.</li>
							<li>Selected slots cannot be changed, modified, or canceled.</li>
							<li>Each registered participant will get a Certificate.</li>
					    </ul>
				</div>
				
				<div class="col-md-3">
				       <h4>Contact Info</h4>
					     
				<ul class="contact_info">
	
	<li class="phone">
	   <i class="fa fa-phone" aria-hidden="true"></i>
		<div>
			<span class="contact-title">Mrs. Sneha Shah:<br></span>
			<span class="contact-text">+91 93267 68194</span>
		</div>
	</li>
	
	<li class="email">
	    <i class="fa fa-envelope"></i>
		<div>
			<span class="contact-title">Email:<br></span>
			<span class="contact-text"><a href="mailto:info@sieindia.com">info@sieindia.com</a></span>
		</div>
	</li>
	
</ul>
						
				</div>
				
				<div class="col-md-12">
				 <div class="border_middle"></div>
				</div>
				
				
				<div class="col-md-8">
				    <p class="fontsize14">Copyright 2022 - #1st Style Italiano Endodontics International Conference in India | Designed by MAK</p>	
				</div>
				
				<div class="col-md-4">
					<div class="footer_bottom">   
					<ul>
					     <li><a target="_blank" href="https://www.sieindia.com/home-new#about"><i class="fa fa-angle-double-right" aria-hidden="true"></i> About us</a></li>
						   <li><a target="_blank" href="https://www.sieindia.com/terms-and-conditions/"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Terms and Conditions</a></li>
						   <li><a target="_blank" href="https://www.sieindia.com/privacy-policy/"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Privacy Policy</a></li>
					   </ul>
						</div>
				</div>
				
				
				
			</div>
		</div>
	</footer>
	
</body>
</html>
