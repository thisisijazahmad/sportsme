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
        <div class="stepwizard">
        @if(isset($user))
        @else
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Step 1</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Step 2</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Step 3</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<form action="{{url('save_profile')}}"  method="post" enctype="multipart/form-data" role="form">
@csrf 
    @if(isset($user))
    
    <input type="hidden" name="id" value="{{$user->id ?? ''}}">

    <div class="row">
    <div class="col-xs-2">
    <h2>Edit Profile!</h2>
    <h5>You can edit profile here.</h5>
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
                            <input  maxlength="100" type="text" required="required" name="first_name" class="form-control" value="{{$user->first_name ?? ''}}" placeholder="Enter First Name"  />
                        </div>
                    </div>
                    <div class="col-md-6">   
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input maxlength="100" type="text" required="required" name="last_name" class="form-control" value="{{$user->last_name ?? ''}}" placeholder="Enter Last Name" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input maxlength="100" type="email" required="required" name="email" value="{{$user->email ?? ''}}" class="form-control" placeholder="Enter Email" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Contact #</label>
                            <input maxlength="100" type="number" required="required" value="{{$user->phone ?? ''}}" name="phone" class="form-control" placeholder="Enter Contact Number" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input maxlength="100" type="password"  name="password" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Facebook Link</label>
                            <input maxlength="200" type="text" required="required" value="{{$user->f_link ?? ''}}" name="facebook_link" class="form-control" placeholder="Enter Facebook Link" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Twitter Link</label>
                            <input maxlength="200" type="text" required="required" value="{{$user->t_link ?? ''}}" name="twitter_link" class="form-control" placeholder="Enter Twitter Link"  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Instagram Link </label>
                            <input maxlength="200" type="text" value="{{$user->insta_link ?? ''}}" required="required" name="insta_link" class="form-control" placeholder="Enter Instagram Link"  />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tiktok Link</label>
                            <input maxlength="200" type="text" required="required" value="{{$user->tiktok_link ?? ''}}" name="tiktok_link" class="form-control" placeholder="Enter Tiktok Link"  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">About me</label>
                            <textarea class="form-control" placeholder="Enter about you"  name="about_me" required>{{$user->about_me ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Profile Image</label>
                            <input maxlength="200" type="file"  name="p_image" class="form-control"   />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Banner Image</label>
                            <input maxlength="200" type="file"  name="b_image" class="form-control"   />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Videos/Images </label>
                            <input maxlength="200" type="file"  name="upload_img_file[]" multiple class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Program</label>
                            <select class="form-control" name="program_id" disabled>
                                
                                @foreach($programs as $program)
                                <option  value="{{$program->id}}" {{ $program->id == ($user->program_id ?? '') ? 'selected' : '' }}>{{$program->name ?? ''}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea maxlength="200" required="required" name="description" class="form-control" placeholder="Enter Description"  >{{$user->description ?? ''}}</textarea>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Edit</button>
            </div>
        </div>
    </div>
    @else
    <div class="row setup-content" id="step-1">
    <div class="col-xs-4">
    <h1>Let's begin your Sports journey!</h1>
    <h5>We're here to guide you every step of the way.</h5>
    </div>
        <div class="col-xs-8">
        <div class="col-xs-3"></div>
            <div class="col-md-8">
                <h3> Account Information</h3>
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input  maxlength="100" type="text" required="required" name="first_name" class="form-control"  placeholder="Enter First Name"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input maxlength="100" type="text" required="required" name="last_name" class="form-control" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input maxlength="100" type="email" required="required" name="email" class="form-control" placeholder="Enter Email" />
                </div>
                <div class="form-group">
                    <label class="control-label">Contact #</label>
                    <input maxlength="100" type="number" required="required" name="phone" class="form-control" placeholder="Enter Contact Number" />
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input maxlength="100" type="password" required="required" name="password" class="form-control" placeholder="Enter Password" />
                </div>
                
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-4">
            <h1>Let's begin your Sports journey!</h1>
            <h5>We're here to guide you every step of the way.</h5>
            </div>
        <div class="col-xs-8">
        <div class="col-xs-3"></div>
            <div class="col-md-8">
                <h3> Personal Information</h3>
                <div class="form-group">
                    <label class="control-label">Facebook Link</label>
                    <input maxlength="200" type="text" required="required" name="facebook_link" class="form-control" placeholder="Enter Facebook Link" />
                </div>
                <div class="form-group">
                    <label class="control-label">Twitter Link</label>
                    <input maxlength="200" type="text" required="required" name="twitter_link" class="form-control" placeholder="Enter Twitter Link"  />
                </div>
                 <div class="form-group">
                    <label class="control-label">Instagram Link </label>
                    <input maxlength="200" type="text" required="required" name="insta_link" class="form-control" placeholder="Enter Instagram Link"  />
                </div>
                 <div class="form-group">
                    <label class="control-label">Tiktok Link</label>
                    <input maxlength="200" type="text" required="required" name="tiktok_link" class="form-control" placeholder="Enter Tiktok Link"  />
                </div>
                <div class="form-group">
                    <label class="control-label">About me</label>
                    <textarea class="form-control" placeholder="Enter about you"  name="about_me" required></textarea>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-4">
            <h1>Let's begin your Sports journey!</h1>
            <h5>We're here to guide you every step of the way.</h5>
        </div>
            <div class="col-xs-8">
            <div class="col-xs-3"></div>
            <div class="col-md-8">
                <h3> Profile Information</h3>
                <div class="form-group">
                    <label class="control-label">Profile Image</label>
                    <input maxlength="200" type="file" required="required" name="p_image" class="form-control"   />
                </div>
                <div class="form-group">
                    <label class="control-label">Banner Image</label>
                    <input maxlength="200" type="file" required="required" name="b_image" class="form-control"   />
                </div>

                 <div class="form-group">
                    <label class="control-label">Videos/Images </label>
                    <input maxlength="200" type="file" required="required" name="upload_img_file[]" multiple class="form-control" />
                </div>
                <div class="form-group">
                    <label class="control-label">Program</label>
                    <select class="form-control" name="program_id">
                        <option value="">Select</option>
                        @foreach($programs as $program)
                        <option value="{{$program->id}}">{{$program->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
                
                 <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea maxlength="200" required="required" name="description" class="form-control" placeholder="Enter Description"  ></textarea>
                </div>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </div>
    @endif
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

