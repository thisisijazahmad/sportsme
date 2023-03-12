<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" >
</script><script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

<!------ Include the above in your HEAD tag ---------->
<title>Profile Build</title>
<style type="text/css">

    .panel-title {

    display: inline;

    font-weight: bold;

    }

    .display-table {

        display: table;

    }

    .display-tr {

        display: table-row;

    }

    .display-td {

        display: table-cell;

        vertical-align: middle;

        width: 61%;

    }

</style>
<style>
body{
    margin-top:40px;
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

html,
body {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
  height: 100%;
  width: 100%;
  background: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
}

.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
}
.card {
  display: block;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #f1efea;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    transition: box-shadow .25s;
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}

.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
.btn-xl {
    padding: 5px 20px;
    font-size: 20px;
    width:40%;
    height:40px;
}
.btn-small {
    padding: 5px 20px;
    font-size: 20px;
    width:26%;
    height:40px;
}
.add_btn-color{
    background-color:#25bbdb;
    color:white;
}
.remove-btn-class{
    background-color:#ffffff;
    color:black;
    border:1px sold black !important;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 0px solid transparent;
}
.disable{
	pointer-events:none;
}
</style>
</head>
<body>

<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            {{-- <a href="#step-1" type="button" disabled class="btn btn-primary btn-circle">1</a> --}}
            <a href="#step-1" type="button" disabled class="btn btn-primary btn-circle disable">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            {{-- <a href="#step-2" type="button" disabled class="btn btn-default btn-circle" disabled="disabled">2</a> --}}
            <a href="#step-2" type="button" disabled class="btn btn-default btn-circle disable" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            {{-- <a href="#step-3" type="button" disabled class="btn btn-default btn-circle" disabled="disabled">3</a> --}}
            <a href="#step-3" type="button" disabled class="btn btn-default btn-circle disable" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<?php $total_variable = null?>
<form  role="form"

action="{{ url('stripe') }}"

method="post"

class="require-validation"

data-cc-on-file="false"

data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"

id="payment-form">
@csrf
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <section class="wrapper">
                    <div class="container-fostrap">

                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4"></div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="card">
                                            <h2 style="padding-top:20px"><strong>Donate Now</strong></h2>

                                            <div class="d-flex justify-content-around" style="padding-top:20px">
                                                <button type="button" class="btn add_btn-color btn-xl single" id="single">single</button>
                                                <button type="button" class="btn remove_btn-color btn-xl monthly" id="monthly">Monthly</button>


                                            </div>
                                                <input type="hidden" name="single" id="single_id">
                                                <input type="hidden" name="monthly" id="monthly_id">
                                                <input type="hidden" name="pund_50" id="pund_50">
                                                <input type="hidden" name="pund_150" id="pund_150">
                                                <input type="hidden" name="pund_250" id="pund_250">
                                                <input type="hidden" name="save_keypress" id="save_keypress" class="save_keypress">
                                            <div class="d-flex justify-content-around" style="padding-top:20px">
                                                <button type="button" class="btn add_btn-color btn-small pound-50" id="single">£50</button>
                                                <button type="button" class="btn remove_btn-color btn-small pound-150" id="single">£150</button>
                                                <button type="button" class="btn remove_btn-color btn-small pound-250" id="monthly">£250</button>

                                            </div>
{{--
                                            <div class="input-group mt-3 mb-5 p-3" >
                                                <button class="btn btn-outline-secondary dropdown-toggle" style="background-color: #FFF; border:1px solid #ced4da;color:#25bbdb" type="button" data-bs-toggle="dropdown" aria-expanded="false">£</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">$</a></li>

                                                </ul> --}}
                                                <div style="padding:6%">
                                                <input type="text" class="form-control" id="other_amount" placeholder="Other Amount" aria-label="Text input with dropdown button">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" id="submit_id">Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <section class="wrapper">
                    <div class="container-fostrap">

                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3"></div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group text-center mb-2"  style="background-color: #ebf9fc; border:1px solid #ced4da;">
                                            <h4 id="total_donation1" ></h4>
                                            <input  type="hidden"  class="btn" name="total_donation" id="total_donation" />
                                            <input  type="hidden"  class="btn" name="total_amount_data"id="total_amount_data" style=""/>
                                        </div>
                                        <div style=" background-color: #fefoeb; border:1px solid #ced4da; padding:3%"><h4>Your Detail</h4>
                                            <div class="form-group shadow-lg p-3 mb-5 bg-white rounded" style="margin-top: 5%">
                                                <div class="row" style="margin-bottom: 3%">

                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Title</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text"  required name="title" class="form-control" placeholder="Title" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>

                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">First Name</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text"  required name ="first_name" class="form-control" placeholder="Enter First Name" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>

                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Last Name</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text" required  name ="last_name" class="form-control" placeholder="Enter Last Name" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>

                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Address 1</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text"  required name="address1" class="form-control" placeholder="Enter Address 1" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Address 2</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text"  name="address2" class="form-control" placeholder="Enter Address 2" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Address 3</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text"  name ="address3" class="form-control" placeholder="Enter Address 3" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Town/City</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text"  required name="town" class="form-control" placeholder="Enter Town/City" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Country/State</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text"  required name="country" class="form-control" placeholder="Enter Country/State" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Email</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="email"  required name="email" class="form-control" placeholder="Enter Email" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                    <div class="row" style="margin-bottom: 3%">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">phone</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input  type="text" required name="phone" class="form-control" placeholder="Enter phone" />
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>

            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-xs-12 col-sm-6" >
                        <div class="container shadow-lg p-3 mb-5 bg-white rounded">

                            <div class="row" style="margin-top:5%">
                                <div class="col-md-6 col-md-offset-3" >
                                    <div style="margin-top:5%; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                    <div class="checkbox" style="margin-bottom:3%;padding-top:2%;">
                                        <label><input type="radio" required name="gift_aid" id="gift_aid" value="1">&nbsp;Yes, I am a UK tax payer and would like Gift Aid claimed on my donations</label>
                                      </div>
                                      <div class="checkbox" style="margin-bottom:3%">
                                        <label><input type="radio" required name="gift_aid" value="do not want Gift Aid">&nbsp;No, I am not a UK tax payer and do not want Gift Aid claimed on my donations</label>
                                      </div>
                                      <div class="checkbox" style="margin-bottom:3%; padding-bottom:2%;">
                                        <label><input type="radio"  required name="gift_aid" value="I am not sure">&nbsp;I am not sure, please dont claim Gift Aid at the moment</label>
                                      </div>

                                </div>
                                      <div class="shadow-lg p-3 mb-5 bg-white rounded text" style="margin-top:5%; margin-bottom:3%;  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                        <h4 style="padding-top:2%;padding-left:3%;"><strong>What is Gift Aid?</strong></h4>
                                        <p style="padding-top:2%;padding-left:3%;padding-right:2%;padding-bottom:2%;">Gift Aid declaration allows Maa to claim tax back on eligible donations. It means that for every £1 you donate to Maa we can claim back 25p, at no extra cost to you.</p>
                                      </div>
                                    <div class="panel panel-default credit-card-box" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

                                        <div class="panel-heading display-table" >

                                            <div class="row display-tr" >

                                                <h3 class="panel-title display-td" >Single Donation</h3>

                                                <div class="display-td" >

                                                    {{-- <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png"> --}}

                                                </div>
                                                <div class="display-td" >

                                                    {{-- <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png"> --}}

                                                </div>

                                            </div>

                                        </div>

                                        <div class="panel-body">



                                            @if (Session::has('success'))

                                                <div class="alert alert-success text-center">

                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                                                    <p>{{ Session::get('success') }}</p>

                                                </div>

                                            @endif



                                            {{-- <form

                                                    role="form"

                                                    action="{{ url('stripe') }}"

                                                    method="post"

                                                    class="require-validation"

                                                    data-cc-on-file="false"

                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"

                                                    id="payment-form">

                                                @csrf --}}



                                                <div class='form-row row'>

                                                    <div class='col-xs-12 form-group required'>

                                                        <label class='control-label'>Name on Card</label> <input

                                                            class='form-control' size='4' type='text'>

                                                    </div>

                                                </div>



                                                <div class='form-row row'>

                                                    <div class='col-xs-12 form-group card required'>

                                                        <label class='control-label'>Card Number</label> <input

                                                            autocomplete='off' class='form-control card-number' size='20'

                                                            type='text'>

                                                    </div>

                                                </div>



                                                <div class='form-row row'>

                                                    <div class='col-xs-12 col-md-4 form-group cvc required'>

                                                        <label class='control-label'>CVC</label> <input autocomplete='off'

                                                            class='form-control card-cvc' placeholder='ex. 311' size='4'

                                                            type='text'>

                                                    </div>

                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>

                                                        <label class='control-label'>Expiration Month</label> <input

                                                            class='form-control card-expiry-month' placeholder='MM' size='2'

                                                            type='text'>

                                                    </div>

                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>

                                                        <label class='control-label'>Expiration Year</label> <input

                                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'

                                                            type='text'>

                                                    </div>

                                                </div>



                                                <div class='form-row row'>

                                                    <div class='col-md-12 error form-group hide'>

                                                        <div class='alert-danger alert'>Please correct the errors and try

                                                            again.</div>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    {{-- <div class="col-xs-12">

                                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (£)</button>

                                                    </div> --}}

                                                </div>
                                            {{-- </form> --}}

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3"></div>
                </div>


                <button class="btn btn-success btn-lg pull-right" type="submit" id="total_amount_data_btn"></button>
            </div>
        </div>
    </div>
</form>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
$(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
        if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid)
        nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-primary').trigger('click');
});
</script>

<script>

    $('#other_amount').keypress(function() {

         other_amount = this.value;
        // console.log(other_amount);
         $('.save_keypress').val(other_amount);

    });



    $('#single_id').val('Single');
    var other_amount_result = $('#other_amount').val();
    console.log(other_amount_result);
    $('#pund_50').val('50');


    var total =  50+other_amount_result;
    console.log(total);
        var amount = 'Donation Total £ 50'
    $('#total_donation').val();

    $(".monthly").on("click", function() {
            $(this).addClass("add_btn-color");
            $(".single").removeClass("add_btn-color");
            $('#monthly_id').val('Monthly');
            $('#single_id').val('');


        });

        $(".single").on("click", function() {

            $(this).addClass("add_btn-color");
            $(".monthly").removeClass("add_btn-color");
            $('#monthly_id').val('');
            $('#single_id').val('Single');


        });

        $(".pound-50").on("click", function() {

            $(this).addClass("add_btn-color");
            $(".pound-150").removeClass("add_btn-color");
            $(".pound-250").removeClass("add_btn-color");
            $('#pund_50').val('50');
            $('#pund_150').val('');
            $('#pund_250').val('');
           // $('#total_donation').val('Donation Total £ 50')


        });

        $(".pound-150").on("click", function() {
            $(this).addClass("add_btn-color");
            $(".pound-50").removeClass("add_btn-color");
            $(".pound-250").removeClass("add_btn-color");
            $('#pund_50').val('');
            $('#pund_150').val('150');
            $('#pund_250').val('');
            //$('#total_donation').val('Donation Total £ 150')

        });
        $(".pound-250").on("click", function() {
            $(this).addClass("add_btn-color");
            $(".pound-50").removeClass("add_btn-color");
            $(".pound-150").removeClass("add_btn-color");
            $('#pund_50').val('');
            $('#pund_150').val('');
            $('#pund_250').val('250');
           // $('#total_donation').val('Donation Total £ 250')
        });

        $("#submit_id").on("click", function() {
            var other_amount = $('.save_keypress').val();
            var fifty = $('#pund_50').val();
            var one_fifty = $('#pund_150').val();
            var two_fifty = $('#pund_250').val();
            console.log(fifty,one_fifty,two_fifty)
            if(fifty != null && fifty!=''){
            var total =  (+fifty) + (+other_amount);;

            }else if(one_fifty != null && one_fifty!=''){
            var total =  (+one_fifty) + (+other_amount);
            }else{
            var total =  (+two_fifty) + (+other_amount);
            }

            $('#total_donation').val('Donation Total £ '+total)
            $('#total_donation1').text('Donation Total £ '+total)
            $("#total_amount_data_btn").html("Pay Now (£ "+total+")");
            $('#total_amount_data').val(total);
          //  console.log(total);
        });
</script>



<script>

    var selectedVal = "";
    $("input[name='gift_aid']").change(function(){
    // Do something interesting here
    var selected = $("input[name='gift_aid']:checked").val();
    var payment_total_amount = $('#total_amount_data').val();
    if(selected == 1){
        var final_total =  (+payment_total_amount)+(+1);
        $("#total_amount_data_btn").html("Pay Now (£ "+final_total+")");
    }
    else{
        $("#total_amount_data_btn").html("Pay Now (£ "+payment_total_amount+")");
    }
});

</script>
<script type="text/javascript">

$(function() {



    var $form         = $(".require-validation");



    $('form.require-validation').bind('submit', function(e) {

        var $form         = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

        $inputs       = $form.find('.required').find(inputSelector),

        $errorMessage = $form.find('div.error'),

        valid         = true;

        $errorMessage.addClass('hide');



        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {

          var $input = $(el);

          if ($input.val() === '') {

            $input.parent().addClass('has-error');

            $errorMessage.removeClass('hide');

            e.preventDefault();

          }

        });



        if (!$form.data('cc-on-file')) {

          e.preventDefault();

          Stripe.setPublishableKey($form.data('stripe-publishable-key'));

          Stripe.createToken({

            number: $('.card-number').val(),

            cvc: $('.card-cvc').val(),

            exp_month: $('.card-expiry-month').val(),

            exp_year: $('.card-expiry-year').val()

          }, stripeResponseHandler);

        }



  });



  function stripeResponseHandler(status, response) {

        if (response.error) {

            $('.error')

                .removeClass('hide')

                .find('.alert')

                .text(response.error.message);

        } else {

            /* token contains id, last4, and card type */

            var token = response['id'];


            var payment_total_amount = $('#total_amount_data').val();
            //var total_amount_data_btn = $('#total_amount_data_btn').val();
            //console.log(payment_total_amount);
            $form.find('input[type=text]').empty();

            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.append("<input type='hidden' name='amount' value='"+total_amount_data+"' />");

            $form.get(0).submit();

        }

    }



});

</script>
</body>
</html>

