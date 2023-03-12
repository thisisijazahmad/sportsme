@extends('admin.layouts.master')
@section('title', 'dashboard')
@section('content')
    <div class="col-lg-10 col-md-9 p-4">
        <div class="row ">
            <div class="col-md-12 pl-3 pt-2">
                <div class="pl-3">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>

        <!-- start info box -->
        <div class="row ">
            <div class="col-md-12 pl-3 pt-2">
                <div class="row pl-3 mt-2">

                    <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                        <a href="{{ url('programs/list') }}">
                            <div class="media shadow-sm p-0 bg-white rounded text-primary ">
                                <span class="oi top-0 rounded-left bg-primary text-light h-100 p-4 oi-badge fs-5"></span>
                                <div class="media-body p-2">
                                    <h6 class="media-title m-0">Programs</h6>
                                    <div class="media-text">
                                        <h3>{{$programs_count ?? '0'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                        <a href="{{ url('messages/list') }}">
                            <div class="media shadow-sm p-0 bg-white rounded text-primary ">
                                <span class="oi top-0 rounded-left bg-primary text-light h-100 p-4 oi-badge fs-5"></span>
                                <div class="media-body p-2">
                                    <h6 class="media-title m-0">Messages</h6>
                                    <div class="media-text">
                                        <h3>{{$messages ?? '0'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                        <a href="#">
                            <div class="media shadow-sm p-0 bg-success-lighter text-light rounded">
                                <span class="oi top-0 rounded-left bg-white text-success h-100 p-4 oi-people fs-5"></span>
                                <div class="media-body p-2">
                                    <h6 class="media-title m-0">Events</h6>
                                    <div class="media-text">
                                        <h3>{{$campaign_count ?? '0'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                        <a href="{{ url('users/list') }}">
                            <div class="media shadow-sm p-0 bg-info-lighter text-light rounded ">
                                <span class="oi top-0 rounded-left bg-white text-info h-100 p-4 oi-tag fs-5"></span>
                                <div class="media-body p-2">
                                    <h6 class="media-title m-0">Users</h6>
                                    <div class="media-text">
                                        <h3>{{$users ?? '0'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end info box -->






@endsection

