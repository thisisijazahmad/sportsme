@extends('layouts.master')
@section('title', 'Events')
@section('content')
    <section>
        <div class="container-fluid">
            <div class=" mt-5 mb-5">
                <section class="sp-prog">
                    <div class="container">
                        <div class="row shadow p-3 mb-5 bg-white rounded">
                            <form action="{{url('save_message')}}"  method="post"  role="form">
                                @csrf

                                <input type="hidden" name="sender_id" value="{{Auth::user()->id ?? ''}}">
                                <div class="row" style="color:black; justify-content: center">
                                    <div class="col-xs-2">
                                        <h2>Contact Us</h2>
{{--                                        <h5>Send your message to you are favourite one.</h5>--}}
                                    </div>
                                    <div class="col-md-6 mt-5">
{{--                                        <div class="col-md-2"></div>--}}
                                        <div class="col-md-12">
{{--                                            <h3> Account Information</h3>--}}
                                            @if (Session::has('success'))
                                                <div class="alert alert-success alert-dismissible"> {{ Session::get('success') }}
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


                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Message</label>
                                                        <textarea name="message" required="required" placeholder="Enter You message" class="form-control" ></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-center">
                                                <button class="btn btn-primary " type="submit" >Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

