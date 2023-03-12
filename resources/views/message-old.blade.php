<!DOCTYPE html>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Profile Build</title>
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
</head>
<body>

<div class="container">
<div class="row ">
<div class="col-xs-5"></div>
    <div class="col-xs-7">
        
    </div>
</div>
<form action="{{url('save_donation')}}"  method="post"  role="form">
@csrf 
    <input type="hidden" name="donated_to_id" value="{{$id ?? ''}}">
    <input type="hidden" name="donator_id" value="{{Auth::user()->id ?? ''}}">
    <div class="row">
    <div class="col-xs-2">
    <h3>Message!</3>
    <h5>Send your message to you are favourite one.</h5>
    </div>
        <div class="col-xs-10">
        <div class="col-xs-3"></div>
            <div class="col-md-8">
                <h3> Account Information</h3>
                @if (Session::has('success'))
                <div class="alert alert-danger alert-dismissible"> {{ Session::get('success') }}
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span> </button> --}}
                </div>
               @endif
               @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible"> {{ Session::get('error') }}
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" ><span aria-hidden="true"></span> </button> --}}
                </div>
               @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input  maxlength="100" type="text" required="required" disabled name="first_name" class="form-control" value="{{Auth::user()->first_name ?? ''}}" placeholder="Enter First Name"  />
                        </div>
                    </div>
                    <div class="col-md-6">   
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input maxlength="100" type="text" required="required" disabled name="last_name" class="form-control" value="{{Auth::user()->last_name ?? ''}}" placeholder="Enter Last Name" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input maxlength="100" type="email" required="required" disabled name="email" value="{{Auth::user()->email ?? ''}}" class="form-control" placeholder="Enter Email" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Contact #</label>
                            <input maxlength="100" type="number" required="required" disabled value="{{Auth::user()->phone ?? ''}}" name="phone" class="form-control" placeholder="Enter Contact Number" />
                        </div>
                    </div>
                </div>
               
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Message</label>
                            <textarea name="message" required="required" placeholder="Enter You message" class="form-control" ></textarea>
                        </div>
                    </div>

                    
                </div>
                 
                 
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Checkout</button>
            </div>
        </div>
    </div>
   
</form>
</div>
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
            curInputs = curStep.find("input[type='text'],textarea,select,input[type='email'],input[type='password'],input[type='number'],input[type='file'],input[type='url']"),
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
</body>
</html>

