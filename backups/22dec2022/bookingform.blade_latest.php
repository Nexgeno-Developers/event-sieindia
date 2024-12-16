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
$state = isset($booking) ? $booking['state'] : null;
$slot_default = isset($booking) ? $booking['slot_default'] : null;
$slot_addition= (isset($booking) && !empty($booking['slot_addition'])) ? $booking['slot_addition'] : array('none');
$price = $price;
@endphp

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
<section id="registraiotn_form" class="registraiotn_form">
    <div class="container">
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
                                    <div class="col-lg-4 col-md-4 col-6 paddright6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="Enter First Name*" value="{{$first_name}}" minlength="3"
                                                maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-6 paddleft6">
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{$last_name}}" placeholder="Enter Last Name*" minlength="3"
                                                maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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

                                            <select class="form-select" name="state" required>
                                                <option value="">Select State</option>
                                                @foreach($states as $row)
                                                <option value="{{$row->name}}" @if($state==$row->name) selected
                                                    @endif>{{ucfirst($row->name)}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-3 col-6 paddright6">
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control"
                                                placeholder="Enter City*" value="{{$city}}" minlength="3" maxlength="50"
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

                                                <span class="price_position"><b>Registration Price:</b> ₹ {{$price}}
                                                </span>
                                            </h4>

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
                                                                                <p class="speakers_cle"> <b>Speaker:</b> {{$slot->speaker}}
                                                                                </p>
                                                                                <p class="topic_desc"
                                                                                    data-topic="{{$slot->description}}"
                                                                                    data-speaker="{{$slot->speaker}}"
                                                                                    data-time="{{$slot->slot_time}}"
                                                                                    data-price="{{$slot->slot_price}}"
																				   data-slot-name="{{$slot->slot_name}}"
																		   data-date="{{date('d F Y', strtotime($date->slot_date))}},
                                                    {{date('l', strtotime($date->slot_date))}}"
																				   >
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
                                                @if ($slot->slot_date == $date->slot_date && $slot->slot_name ==
                                                $class->slot_name)
                                                <div
                                                    class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex sblock sblock_{{$slot->id}}">
                                                    <div
                                                        class="events_boxex {{date('l', strtotime($date->slot_date))}}">
                                                        <div class="row">
                                                            <div class="col-md-2 col-1">
                                                                <input onchange="validate_slot_addition(this)"
                                                                    name="slot_addition[]" type="radio"
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
                                                                        <p class="speakers_cle"> <b>Speaker:</b> {{$slot->speaker}} </p>
                                                                        <p class="topic_desc"
                                                                            data-topic="{{$slot->description}}"
                                                                            data-speaker="{{$slot->speaker}}"
                                                                            data-time="{{$slot->slot_time}}"
                                                                            data-price="{{$slot->slot_price}}"
																		    data-slot-name="{{$slot->slot_name}}"
																		   data-date="{{date('d F Y', strtotime($date->slot_date))}},
                                                    {{date('l', strtotime($date->slot_date))}}"
																		   >
                                                                            <b>Topic:</b> {{$slot->description}}</p>
                                                                        <p><b>Time:</b> {{$slot->slot_time}} </p>
                                                                        <p class="price_position"><b>₹:</b>
                                                                            {{$slot->slot_price}} </p>

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

                            <div class="col-md-12 text-end mt-5 pddrght50">
                                <div class="checkbox_area">
                                    <input type="checkbox" id="term_agree" name="term_agree" required="">
                                    <label for="term_agree"> I Agree to SIE India <a
                                            href="https://www.sieindia.in/terms-and-conditions/" target="_blank"
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
                <p class="text-danger mb-0">* Non Refundable.</p>
                <p class="text-danger mb-0">* Cannot change or alter to any other WS.</p>
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
                <button type="button" class="close close_cls" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
</button>
            </div>
            <div class="modal-body">
            <img class="bg-dark p-2 w-100 mb-2" src="https://www.sieindia.in/wp-content/uploads/2022/11/Final-SIE-Logo-White.png">  
                        
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
    $('input[disabled]').closest('.events_boxex').attr('style', 'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');
    price_calculation();
});

//change slot addition field
$('body').on('change', 'input[name="slot_addition[]"]', function() {
    price_calculation();
});

//price calculation
function price_calculation() {
    var slot_default_price = '{{$price}}';

    var slot_addition_price = 0;
    $('.slot_addition_main input:radio:checked').each(function() {
        slot_addition_price += parseInt($(this).attr('data-price'));
    });

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
        $('#booking_f_proceed').click(function() {
            form.submit();
        });
    }
});

//validate slot default
function validate_slot_default(this_event) {
    var data_target = $(this_event).attr('data-target');
    var is_checked = $(this_event).prop('checked');

    $('.slot_addition_main input[disabled]').closest('.events_boxex').attr('style', '');

    $('input:radio[name="slot_addition[]"]').each(function() {
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

    $('.slot_addition_main input[disabled]').closest('.events_boxex').attr('style', 'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');

    $('.slot_addition_default .events_boxex').attr('style', '');
    $('.slot_addition_default input[disabled]').closest('.events_boxex').attr('style', 'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');
    $(this_event).closest('.events_boxex').attr('style', 'background: #4caf5087;box-shadow: 5px 5px 0px 1px #4caf50b5;');

    price_calculation();
}

//validate slot addition
function validate_slot_addition(this_event) {
    var data_target = $(this_event).attr('data-target');
    var is_checked = $(this_event).prop('checked');

    $('.slot_addition_main .events_boxex').attr('style', '');
    $('.slot_addition_main input[disabled]').closest('.events_boxex').attr('style', 'background:rgb(255 0 0 / 15%);pointer-events: none;box-shadow: 5px 5px 0px 1px #b8122847;');
    $(this_event).closest('.events_boxex').attr('style', 'background: #4caf5087;box-shadow: 5px 5px 0px 1px #4caf50b5;');

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

$('body').on('click', '.topic_desc', function(){
    //var speaker = $(this).attr('data-speaker');
    var topic   = $(this).attr('data-topic');
    //var time    = $(this).attr('data-time');
    //var price   = $(this).attr('data-price');
    //$('#topicModal .modal-body .speaker').html(speaker);
    $('#topicModal .modal-body .topic').html(topic);
    //$('#topicModal .modal-body .time').html(time);
    //$('#topicModal .modal-body .price').html(price);
    $('#topicModal').modal('show');
});
	
function finalCart()
{
    var deft = $('.slot_addition_default input[name="slot_default"]:checked').attr('id');
    var deft = $('.slot_addition_default label[for="'+deft+'"]').find('.topic_desc');
    var deft_speaker = $(deft).attr('data-speaker');
    var deft_topic   = $(deft).attr('data-topic');
    var deft_time    = $(deft).attr('data-time');
    var deft_price   = '{{$price}}';
    var deft_date    = $(deft).attr('data-date');
    var deft_slot    = $(deft).attr('data-slot-name');

    var addt = $('.slot_addition_main input[name="slot_addition[]"]:checked').attr('id');
    var addt = $('.slot_addition_main label[for="'+addt+'"]').find('.topic_desc');
    var addt_speaker = $(addt).attr('data-speaker');
    var addt_topic   = $(addt).attr('data-topic');
    var addt_time    = $(addt).attr('data-time');
    var addt_price   = $(addt).attr('data-price');
    var addt_date    = $(addt).attr('data-date');
    var addt_slot    = $(addt).attr('data-slot-name');  
    
    var pr = parseInt(deft_price) + parseInt(addt_price);
    
    $('.finalCart').html('<table><tbody><tr><th width="10%"><b>Sr. No.</b></th><th width="10%"><b>Slot Name</b></th><th width="15%"><b>Speaker</b></th><th width="30%"><b>Topics</b></th><th width="20%"><b>Date</b></th><th width="15%"><b>Timing</b></th><th width="20%"><b>Amount</b></th></tr><tr><td>1.</td><td>'+ deft_slot +'</td><td>'+ deft_speaker +'</td><td>'+ deft_topic +'</td><td>'+ deft_date +'</td><td>'+ deft_time +'</td><td>₹'+ deft_price +'</td></tr><tr><td>1.</td><td>'+ addt_slot +'</td><td>'+ addt_speaker +'</td><td>'+ addt_topic +'</td><td>'+ addt_date +'</td><td>'+ addt_time +'</td><td>₹'+ addt_price +'</td></tr></tbody></table><div class="text-right"><b>Total: ₹'+pr+'</b></div>');
}	
</script>
@endsection