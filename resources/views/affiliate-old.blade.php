@extends('layouts.master')
@section('title', 'Affiliate')
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
                <div class="panel-title text-center">Reference Code <i class="fa fa-list"></i></div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body" >
                <form  class="form-horizontal"  >
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
                                <input type="number" class="form-control input-sm" name="phone" disabled value="{{Auth::user()->phone ?? ''}}"  placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row" >
                    <div class="col-md-6" >
                        <div class="form-group" >
                            <label for="lastname" class="col-md-4 control-label">Link </label>
                            <div class="col-md-8" style="margin-top: 8px;">

                                    <p id="copy" >{{ $link }}</p>
                                    {{-- <button value="copy" onclick="copyToClipboard()">Copy!</button> --}}

                                {{-- <p>{{ $link}}</p> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-4" ></div>
                        <div class="col-md-8" >
                    <div class="card-body">
                        <input type="text" id="copy" value="{{ $link }}"style="width: 100%">
                        <button value="copy" onclick="copyToClipboard('copy')">Copy!</button>
                 </div>
                </div>
                </div> --}}

                </div>

                    <!-- <div class="form-group">
                        <div class="col-md-offset-5 col-md-7">
                            <button id="btn-signup" type="submit" class="btn btn-primary btn-sm"> Save <i class="fa fa-user-plus"></i></button>
                        </div>
                    </div> -->


            </div>
        </div>
    </div>
</div>
@endsection
{{-- <script>
    function copyToClipboard(id) {

        // console.log(id);
        // document.getElementById(id).select();
        // document.execCommand('copy');
        let element = document.getElementById(id); //select the element
        let elementText = element.textContent; //get the text content from the element
        copyText(elementText);
    } --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function copyToClipboard() {
    /* Get the text field */
    var copyText = document.getElementById("copy");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
  }
  </script> --}}
