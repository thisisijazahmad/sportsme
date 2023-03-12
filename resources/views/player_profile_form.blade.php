@extends('layouts.master')
@section('title', 'Profile')
@push('styles')
<style>

.input-group-addon {
   color: #fff;
   background-color: #337ab7;
}


.form-control, .input-group-addon {
   border-radius: 0px;
}
label{
  text-align: left !important;
}
</style>
@endpush
@section('content')
<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-7 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title text-center">Build Profile <i class="fa fa-user-plus"></i></div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>  
            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" action="{{url('save_profile')}}"  method="post" enctype="multipart/form-data">
                 @csrf
                    @if(Session::has('error'))
                            <p class="alert alert-danger mt-2">{{ Session::get('error') }}</p>
                    @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" name="email" disabled value="{{Auth::user()->email ?? ''}}" placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" name="firstname" disabled value="{{Auth::user()->first_name ?? ''}}" placeholder="First Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" name="lastname" disabled value="{{Auth::user()->last_name ?? ''}}" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone#</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control input-sm" name="phone"  placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Profile Image</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control input-sm" name="p_image"  >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Images/Videos</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control input-sm" id="files" name="upload_img_file[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Facebook Link</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" name="facebook_link"  placeholder="Facebook Link">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Twitter Link</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" name="twitter_link"  placeholder="Twitter Link">
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Instagram Link</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" name="insta_link"  placeholder="Instagram Link">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Tiktok Link</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" name="tiktok_link"  placeholder="Tiktok Link">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Program</label>
                            <div class="col-md-8">
                            <select class="form-control input-sm" name="program_id">
                                <option value="">Select</option>
                                @foreach($programs as $program)
                                <option value="{{$program->id}}">{{$program->name ?? ''}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea  class="form-control input-sm" name="description" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group">                                      
                        <div class="col-md-offset-5 col-md-7">
                            <button id="btn-signup" type="submit" class="btn btn-primary btn-sm"> Save <i class="fa fa-user-plus"></i></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>  
    </div> 
</div>
@endsection
