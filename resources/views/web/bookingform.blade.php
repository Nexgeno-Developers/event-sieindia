@extends('web.layouts.app')
@section('main.content')
<style>
option[disabled] {
    color: #ff5722 !important;
}

/*label[disabled] { color: #ff5722 !important; }*/
.error {
    color: red;
}
</style>
@php
$booking = Session::get('booking');
$first_name = isset($booking) ? $booking['first_name'] : null;
$last_name = isset($booking) ? $booking['last_name'] : null;
$email = isset($booking) ? $booking['email'] : null;
$phone = isset($booking) ? $booking['phone'] : null;
$dci_no = isset($booking) ? $booking['dci_no'] : null;
$city = isset($booking) ? $booking['city'] : null;
$zipcode = isset($booking) ? $booking['zipcode'] : null;
$state = null; //isset($booking) ? $booking['state'] : null;
$slot_default = isset($booking) ? $booking['slot_default'] : null;
$slot_addition= (isset($booking) && !empty($booking['slot_addition'])) ? $booking['slot_addition'] : array('none');
$price = $price;

$business_settings = DB::table('business_settings')->where('id', '1')->first();

@endphp

@if(isset(auth()->guard('web')->user()->id) && !empty(auth()->guard('web')->user()->id))
    @php 
        $order = DB::table('orders')->where('phone', auth()->guard('web')->user()->phone)->first();
        $displayForm = ( isset($order->id) && !empty($order->id) ) ? 'no' : 'yes';
    @endphp
@else
    @php $displayForm = 'yes'; @endphp
@endif

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
<section id="registraiotn_form" class="registraiotn_form">
    <div class="container" style="{{ ( $displayForm == 'yes' ) ? '' : 'pointer-events: none; opacity: 0.5;' }}"> <!--{{-- $order ? 'pointer-events: none; opacity: 0.5;' : '' --}}-->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="registraiotn_form_box">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="heading_cls">Registration Form</h4>
                        </div>
                        <div class="col-lg-6">
                            <div class="connect_info1">
                                <p>For International Registration connect on <a target="_blank"
                                        href="https://api.whatsapp.com/send?phone=919326768194"><i
                                            class="fa fa-whatsapp" aria-hidden="true"></i></a></p>
                            </div>
                        </div>
                    </div>

                    <form action="{{url('create_booking')}}" method="post" role="form" id="booking_f">
                        @csrf
                        <step-title>Booking {{$plan}}</step-title>
                        <step>
                            <div class="register_clouom_one">
                                <div class="row">
                                    @if($errors->any())
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                            style="font-size: 14px;">
                                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-3 col-md-3 col-6 paddright6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="Enter First Name*" value="{{$first_name}}" minlength="3"
                                                maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 paddleft6">
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{$last_name}}" placeholder="Enter Last Name*" minlength="3"
                                                maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email*" value="{{$email}}" minlength="10"
                                                maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 paddright6">
                                        <div class="form-group">
                                            <input type="number" pattern="[0-9]+" class="form-control" name="phone"
                                                placeholder="Enter Mobile Number*" value="{{$phone}}" minlength="10"
                                                maxlength="10" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-6 paddleft6">
                                        <div class="form-group">

                                            <select class="form-select select2" name="state" required>
                                                <option value="">Select State</option>
                                                @foreach($states as $row)
                                                {{--<option value="{{$row->name}}" @if($state==$row->name) selected
                                                    @endif>{{ucfirst($row->name)}}</option>--}}
                                                    <option value="{{$row->name}}">{{ucfirst($row->name)}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-3 col-6 paddright6">
                                        <div class="form-group">
                                            <select class="form-select select2" name="city" required>
                                                <option value="">Select City</option>
                                                {{--@foreach($cities as $row)
                                                <option value="{{$row->name}}" @if($cities == $row->name) selected @endif>
                                                    {{ucfirst($row->name)}}
                                                </option>
                                                @endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-6 paddright6">
                                        <div class="form-group">
                                            <input type="text" name="zipcode" class="form-control"
                                                placeholder="Enter Zipcode*" value="{{$zipcode}}" minlength="3" maxlength="50"
                                                required>
                                        </div>
                                    </div>                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-6 paddleft6">
                                        <div class="form-group">
                                            <input type="text" name="dci_no" class="form-control"
                                                placeholder="Enter DCI Register No.*" value="{{$dci_no}}" minlength="3"
                                                maxlength="50" required>
                                        </div>
                                    </div>




                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="font-size18 mtmb20">Select your 1 Free Hands-on(only one option
                                                can be selected) <span>*</span>

                                                <span class="price_position"><b>Registration Price:</b> ₹ <span class="df-total">{{$price}}</span>
                                                </span>
                                            </h4>

                                            <div id="coupon-block">
                                               <div class="row">
												<div class="col-md-7 col-7"><input type="text" name="coupon_code" class="form-control" data-status="0" minlength="10" maxlength="10"></div>
                                               <div class="col-md-5 col-5"> <button onclick="apply_coupon();" type="button" class="btn btn-success book_new_btn">
                                                    Apply Coupon
                                                </button></div>
												   </div>
                                            </div>

                                            <div class="col-md-12 multi_select_cls slot_addition_default">
                                                @foreach ($dates as $date)
                                                <h4 class="heading_title">
                                                    <b><i>{{date('d F Y', strtotime($date->slot_date))}},
                                                            {{date('l', strtotime($date->slot_date))}}</i></b>
                                                </h4>
                                                @foreach ($classes as $class)
                                                <h5 class="multi_cls">{{$class->slot_name}}</h5>
                                                <div class="_form-check">
                                                    <div class="row">
                                                        @foreach ($slots as $slot)
                                                        @if ($slot->slot_date == $date->slot_date && $slot->slot_name ==
                                                        $class->slot_name)
                                                        <div
                                                            class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex sblock sblock_{{$slot->id}}">
                                                            <div
                                                                class="events_boxex {{date('l', strtotime($date->slot_date))}}">
                                                                <div class="row">
                                                                    <div class="col-md-2 col-1">
                                                                        <input onchange="validate_slot_default(this)"
                                                                            name="slot_default" type="radio"
                                                                            value="{{$slot->id}}"
                                                                            data-target="{{strtotime($date->slot_date)}}_{{md5($slot->slot_time)}}"
                                                                            data-slot="{{$slot->slot_seats}}"
                                                                            data-price="{{$slot->slot_price}}"
                                                                            id="slot_d{{$slot->id}}"
                                                                            @if($slot->slot_seats <= 0) disabled @endif
                                                                            required>
                                                                    </div>

                                                                    <div class="col-md-10 col-11 paddleft0">
                                                                        <label class="" for="slot_d{{$slot->id}}"
                                                                            @if($slot->slot_seats <= 0) disabled @endif>
																			<p class="speakers_cle"> <b>Workshop:</b>
                                                                                    {{$slot->workshop}}
                                                                                </p>
                                                                                <p class="speakers_cle"> <b>Speaker:</b>
                                                                                    @php echo html_entity_decode($slot->speaker) @endphp
                                                                                </p>
                                                                                <p class="topic_desc"
                                                                                    data-topic="{{$slot->description}}"
                                                                                    data-speaker="{{$slot->speaker}}"
                                                                                    data-time="{{$slot->slot_time}}"
                                                                                    data-price="{{$slot->slot_price}}"
                                                                                    data-slot-name="{{$slot->slot_name}}"
                                                                                    data-date="{{date('d F Y', strtotime($date->slot_date))}},
                                                    {{date('l', strtotime($date->slot_date))}}">
                                                                                    <b>Topic:</b>
                                                                                    {{$slot->description}}
                                                                                </p>


                                                                                <p><b>Time:</b> {{$slot->slot_time}}
                                                                                </p>

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach

                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </step>
                        <step-title>Extra Hands On</step-title>
                        <step>
                            <div class="register_clouom_two">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="font-size18 mtmb20 paddleftrght50">Want extra Hands-on (Multiple
                                            Select
                                            Option) <span></span></h4>
                                    </div>
                                    <div class="col-md-12 multi_select_cls slot_addition_main">
                                        @foreach ($dates as $date)
                                        <h4 class="heading_title paddleftrght50">
                                            <b><i>{{date('d F Y', strtotime($date->slot_date))}},
                                                    {{date('l', strtotime($date->slot_date))}}</i></b>
                                        </h4>
                                        @foreach ($classes as $class)
                                        <h5 class="multi_cls paddleftrght50">{{$class->slot_name}}</h5>
                                        <div class="form-check paddleftrght50">
                                            <div class="row">
                                                @foreach ($slots as $slot)
                                                @if($slot->speaker != 'DR OSAMA SHAALAN - 3M')
                                                @if ($slot->slot_date == $date->slot_date && $slot->slot_name ==
                                                $class->slot_name)
                                                <div
                                                    class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex sblock sblock_{{$slot->id}}">
                                                    <div
                                                        class="events_boxex {{date('l', strtotime($date->slot_date))}}">
                                                        <div class="row">
                                                            <div class="col-md-2 col-1">
                                                                <input onchange="validate_slot_addition(this)"
                                                                    name="slot_addition[]" type="checkbox"
                                                                    value="{{$slot->id}}"
                                                                    data-target="{{strtotime($date->slot_date)}}_{{md5($slot->slot_time)}}"
                                                                    data-slot="{{$slot->slot_seats}}"
                                                                    data-price="{{$slot->slot_price}}"
                                                                    id="slot_{{$slot->id}}" @if($slot->slot_seats <= 0)
                                                                    disabled @endif>
                                                            </div>

                                                            <div class="col-md-10 col-11 paddleft0">
                                                                <label class="" for="slot_{{$slot->id}}"
                                                                    @if($slot->slot_seats <= 0) disabled @endif>
																	<p class="speakers_cle"> <b>Workshop:</b>
                                                                                    {{$slot->workshop}}
                                                                                </p>
                                                                        <p class="speakers_cle"> <b>Speaker:</b>
                                                                            @php echo html_entity_decode($slot->speaker) @endphp </p>
                                                                        <p class="topic_desc"
                                                                            data-topic="{{$slot->description}}"
                                                                            data-speaker="{{$slot->speaker}}"
                                                                            data-time="{{$slot->slot_time}}"
                                                                            data-price="{{$slot->slot_price}}"
                                                                            data-slot-name="{{$slot->slot_name}}"
                                                                            data-date="{{date('d F Y', strtotime($date->slot_date))}},
                                                    {{date('l', strtotime($date->slot_date))}}">
                                                                            <b>Topic:</b> {{$slot->description}}
                                                                        </p>
                                                                        <p><b>Time:</b> {{$slot->slot_time}} </p>
                                                                        <p class="price_position"><b>₹:</b>
                                                                            {{$slot->slot_price}} </p>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach

                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-end mt-5 pddrght50">
                                <div class="checkbox_area">
                                    <input type="checkbox" id="term_agree" name="term_agree" required="">
                                    <label for="term_agree"> I Agree to SIE India <a
                                            href="https://www.sieindia.com/terms-and-conditions/" target="_blank"
                                            style="color: #000 !important; text-decoration: underline !important;">Terms
                                            &amp; Conditions</a></label>
                                </div>
                            </div>

                            <div class="">
                                <hr>
                            </div>
                        </step>

                        <div class="register_clouom_three">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group text-end">

                                        <p class="total_amnt">
                                            Total Amonut:
                                            <span>
                                                ₹ <span id="grand-total">{{$price}}</span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- confirmModal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm to proceed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Order Information :</p>
                <div style="font-size:12px" class="finalCart"></div>
                <p class="text-danger mb-0 text-end">* Non Refundable.</p>
                <p class="text-danger mb-0 text-end">* Cannot change or alter to any other WS.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="booking_f_proceed">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- TopicModal -->
<div class="modal fade" id="topicModal" tabindex="-1" aria-labelledby="topicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close close_cls" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="topic_logobg"><img
                        src="https://event.sieindia.com/public/assets/final_logoevents.png"> </div>

                <!--<p><b>Speaker:</b> <span class="speaker"></span></p>
                <p><b>Topic:</b> <span class="topic"></span></p>
                <p><b>Time:</b> <span class="time"></span></p>
                <p><b>Price:</b> ₹<span class="price"></span></p>-->
                <p><b>Topic: </b><span class="topic"></span></p>
            </div>
        </div>
    </div>
</div>


@endsection
@section('main.script')
<script>
//execute on page load
$(document).ready(function() {
    $('.select2').select2({
        closeOnSelect: true
    });
    $('input[disabled]').closest('.events_boxex').attr('style',
        'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');
    price_calculation();
});

//change slot addition field
$('body').on('change', 'input[name="slot_addition[]"]', function() {
    price_calculation();
});

//price calculation
function price_calculation() {
     
    var coupon_code_status = $('input[name="coupon_code"]').attr('data-status');

    var slot_default_price = (coupon_code_status == 1) ? 0 : '{{$price}}';

    var slot_addition_price = 0;
    $('.slot_addition_main input:checkbox:checked').each(function() {
        slot_addition_price += parseInt($(this).attr('data-price'));
    });

    $('.df-total').text(parseInt(slot_default_price));

    $('#grand-total').html(parseInt(slot_default_price) + parseInt(slot_addition_price));
}

//jquery validate form plugin

var form = $("#booking_f");
form.steps({
    headerTag: "step-title",
    bodyTag: "step",
    transitionEffect: 1,
    transitionEffectSpeed: 500,
    labels: {
        cancel: "Cancel",
        current: "",
        pagination: "Pagination",
        finish: "Submit",
        next: "Next",
        previous: "Previous",
        loading: "Loading ..."
    },
    onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        finalCart();
        $("#confirmModal").modal('show');
        $('#booking_f_proceed').click(function(event) {
			event.preventDefault();
			$(this).html('processing...');
			$(this).css('opacity', '0.5');
			$(this).css('pointer-events', 'none');
			//alert(1);
            form.submit();
        });
    }
});

//validate slot default
function validate_slot_default(this_event) {
    var data_target = $(this_event).attr('data-target');
    var is_checked = $(this_event).prop('checked');

    $('.slot_addition_main input[disabled]').closest('.events_boxex').attr('style', '');

    $('input:checkbox[name="slot_addition[]"]').each(function() {
        if (parseInt($(this).attr('data-slot')) > 0) {
            if ($(this).attr('data-target') == data_target) {
                $(this).attr('disabled', 'disabled');
                $(this).prop('checked', false);
            } else {
                $(this).removeAttr('disabled');
                $(this).prop('checked', false);
            }
        }
    });

    $('.slot_addition_main input[data-slot="0"]').attr("disabled", 'disabled');

    $('.slot_addition_main input[disabled]').closest('.events_boxex').attr('style',
        'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');

    $('.slot_addition_default .events_boxex').attr('style', '');
    $('.slot_addition_default input[disabled]').closest('.events_boxex').attr('style',
        'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');
    $(this_event).closest('.events_boxex').attr('style',
    'background: #4caf5087;box-shadow: 5px 5px 0px 1px #4caf50b5;');

    price_calculation();
}

//validate slot addition
/*function validate_slot_addition(this_event) {
    var data_target = $(this_event).attr('data-target');
    var is_checked = $(this_event).prop('checked');

    $('.slot_addition_main .events_boxex').attr('style', '');
    $('.slot_addition_main input[disabled]').closest('.events_boxex').attr('style',
        'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');
    $(this_event).closest('.events_boxex').attr('style',
    'background: #4caf5087;box-shadow: 5px 5px 0px 1px #4caf50b5;');

    price_calculation();
}*/

function validate_slot_addition(this_event) { //created new function and deleted old by rashid
    var data_target = $(this_event).attr('data-target');
    var is_checked = $(this_event).prop('checked');
    
    //$('.slot_addition_main .events_boxex').attr('style', '');
    $('.slot_addition_main input[disabled]').closest('.events_boxex').attr('style',
        'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');
    
    if(is_checked){
        $(this_event).closest('.events_boxex').attr('style', 'background: #4caf5087;box-shadow: 5px 5px 0px 1px #4caf50b5;');
    }else{
        $(this_event).closest('.events_boxex').attr('style', 'background: #b8122861;box-shadow: 5px 5px 0px 1px #a6354485;');
    }

    
    
    

    price_calculation();
}

//button fixed in mobile
$(document).ready(function() {
    var screen_width = $(window).width();
    if (screen_width < 767) {
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 480) {
                if (($('body').height() - 1700) <= ($(window).height() + $(window).scrollTop())) {
                    $('.register_clouom_three').attr('style', '');
                    $('.register_clouom_three').addClass('addscrollclass');
                } else {
                    $('.register_clouom_three').attr('style',
                        'position:fixed;bottom:0;margin-top:10px;z-index:500');
                    $('.register_clouom_three').addClass('addscrollclass1');
                }
            } else {
                $('.register_clouom_three').attr('style', '');
                $('.register_clouom_three').removeClass('addscrollclass');
            }
        });
    }
});

$('body').on('click', '.topic_desc', function() {
    //var speaker = $(this).attr('data-speaker');
    var topic = $(this).attr('data-topic');
    //var time    = $(this).attr('data-time');
    //var price   = $(this).attr('data-price');
    //$('#topicModal .modal-body .speaker').html(speaker);
    $('#topicModal .modal-body .topic').html(topic);
    //$('#topicModal .modal-body .time').html(time);
    //$('#topicModal .modal-body .price').html(price);
    $('#topicModal').modal('show');
});

function finalCart() {
    var deft = $('.slot_addition_default input[name="slot_default"]:checked').attr('id');
    var deft = $('.slot_addition_default label[for="' + deft + '"]').find('.topic_desc');
    var deft_speaker = $(deft).attr('data-speaker');
    var deft_topic = $(deft).attr('data-topic');
    var deft_time = $(deft).attr('data-time');
    var deft_price = $('.df-total').html();
    var deft_date = $(deft).attr('data-date');
    var deft_slot = $(deft).attr('data-slot-name');

    var addtt = $('.slot_addition_main input[name="slot_addition[]"]:checked').attr('id');

   /* var addt = $('.slot_addition_main label[for="' + addtt + '"]').find('.topic_desc');
    var addt_speaker = $(addt).attr('data-speaker');
    var addt_topic = $(addt).attr('data-topic');
    var addt_time = $(addt).attr('data-time');
    var addt_price = $(addt).attr('data-price') ? $(addt).attr('data-price') : 0;
    var addt_date = $(addt).attr('data-date');
    var addt_slot = $(addt).attr('data-slot-name'); */

    //var pr = parseInt(deft_price) + parseInt(addt_price);

    var checkboxes = $('.slot_addition_main input[name="slot_addition[]"]:checked');
    var html2 = '';
    var j = 2;
    var addit_total_price = 0;

    console.log(addtt);

    for (var i = 0; i < checkboxes.length; i++) {
        var checkbox = checkboxes[i];
        var addtt = $(checkbox).attr('id');
        var addt = $('.slot_addition_main label[for="' + addtt + '"]').find('.topic_desc');
        var addt_speaker = $(addt).attr('data-speaker');
        var addt_topic = $(addt).attr('data-topic');
        var addt_time = $(addt).attr('data-time');
        var addt_price = $(addt).attr('data-price') ? $(addt).attr('data-price') : 0;
        var addt_date = $(addt).attr('data-date');
        var addt_slot = $(addt).attr('data-slot-name');


        html2 += '<tr><td>' + (j + i) + '.</td><td>' + addt_slot + '</td><td>' +
            addt_speaker + '</td><td>' + addt_topic + '</td><td>' + addt_date + '</td><td>' + addt_time + '</td><td>₹' +
            addt_price + '</td></tr>';

        addit_total_price += parseInt(addt_price);
    }

    var pr = parseInt(deft_price) + parseInt(addit_total_price);
    
    /*var html2 = '';
    console.log(addtt);
    if(addtt != undefined)
    {
        html2 = '<tr><td>2.</td><td>' + addt_slot + '</td><td>' +
        addt_speaker + '</td><td>' + addt_topic + '</td><td>' + addt_date + '</td><td>' + addt_time + '</td><td>₹' +
        addt_price + '</td></tr>';
    }*/


    $('.finalCart').html(
        '<div class="table-responsive"><table><tbody><tr><th width="10%"><b>Sr. No.</b></th><th width="10%"><b>Slot Name</b></th><th width="15%"><b>Speaker</b></th><th width="30%"><b>Topics</b></th><th width="20%"><b>Date</b></th><th width="15%"><b>Timing</b></th><th width="20%"><b>Amount</b></th></tr><tr><td>1.</td><td>' +
        deft_slot + '</td><td>' + deft_speaker + '</td><td>' + deft_topic + '</td><td>' + deft_date + '</td><td>' +
        deft_time + '</td><td>₹' + deft_price + '</td></tr> '+html2+' </tbody></table></div><div class="text-right"><b>Total: ₹' + pr + '</b></div>');
}
</script>

<script>
    function apply_coupon()
    {
        var coupon_code = $('input[name="coupon_code"]').val();
        if(coupon_code == '')
        {
            alert('please enter coupon code if you have any');
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'{{url("apply_coupon")}}',
                data: { _token : '<?php echo csrf_token() ?>', coupon_code : coupon_code },
                success:function(response) {
                    if(response == 1)
                    {
                        alert('Coupon applied successfully!');
                        $('#coupon-block').html('<p class="text-success mt-2"><b>'+coupon_code+'</b> coupon applied successfully</b><input type="hidden" name="coupon_code" value="'+coupon_code+'" data-status="1"></p>');
                        price_calculation();
                    }
                    else
                    {
                        alert('Invalid coupon!');
                    }
                }
            });            
        }
    }
</script>

<script>

var maxAllowedSelections = {{ $business_settings->checkbox }};
var checkboxes = $('.slot_addition_main input[name="slot_addition[]"]');

checkboxes.on('change', function() {
  var selectedCheckboxes = checkboxes.filter(':checked');

  if (selectedCheckboxes.length > maxAllowedSelections) {
    alert("You can't select more than " + maxAllowedSelections + " checkboxes.");
    $(this).prop('checked', false);
    validate_slot_addition($(this)); //added this by rashid
  }
});

$(document).on('change', '[name=state]', function() {
    var state = $(this).val();
    get_city(state);
});

function get_city(state) {
    $('[name="city"]').html("");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('get-city')}}",
        type: 'POST',
        data: {
            state: state
        },
        success: function (response) {
            var obj = JSON.parse(response);
            if(obj != '') {
                $('[name="city"]').html(obj);
            }
        }
    });
}

$(document).ready(function() {
    $('.select2').select2();
});
</script>


@endsection