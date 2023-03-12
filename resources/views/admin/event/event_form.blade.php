@extends('admin.includes.master')
@section('title', 'Add Event ')
@section('content')
        <section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-11">
                <div class="title mb-30 text-center">
                  <h2>Event Information</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-1">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">

                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
@php
if(isset($event->id))
$required = '';
else
$required = 'required';
@endphp
          <!-- ========== form-elements-wrapper start ========== -->
          <div class="form-elements-wrapper ">
            <div class="row">
            <div class="col-lg-2">

              </div>
              <div class="col-lg-8 ">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible"> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true"></span> </button>
                </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible"> {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span
                                aria-hidden="true"></span> </button>
                    </div>
                @endif
                <!-- input style start -->
                <div class="card-style mb-10 shadow-lg p-3 mb-5 bg-white rounded">
                <form action="{{url('save_event')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$event->id ?? ''}}">
                  <div class="row">
                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Title</label>
                        <input type="text" placeholder="Enter Title" name="title" required class="form-control" value="{{$event->title??''}}"/>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Date</label>
                        <input type="date" placeholder="Date" required name="date" value="{{$event->date??''}}"/>
                      </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Total Tickets </label>
                        <input type="number" placeholder="Total Tickets " required name="tickets" value="{{$event->tickets ?? ''}}"/>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Call Duration (minuts)</label>
                        <input type="number" placeholder="Call Duration"  name="call_duration" value="{{$event->call_duration ?? ''}}"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Remaining Call Notification </label>
                        <input type="number" placeholder="Remaining Call Notification" required name="r_c_limit" value="{{$event->r_c_limit ?? ''}}"/>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Reconnect Call Limit</label>
                        <input type="number" placeholder="Enter Reconnect Call Limit"  name="reconnect_limit" value="{{$event->reconnect_limit ?? ''}}"/>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Image</label>
                        <input type="file" name="image" {{$required}}/>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="input-style-1">
                        <label>Price ($)</label>
                         <input type="number" name="price" Placeholder="Enter Price" required value="{{$event->price ?? ''}}"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                     <div class="col-6">
                      <div class="input-style-1">
                        <label>Location</label>
                        <textarea  placeholder="Enter Location" required name="location"/>{{$event->location ?? ''}}</textarea>
                      </div>
                    </div>
                  </div>

                     <div class="col-12 text-center">
                      <button class="main-btn success-btn btn-hover">
                        Save
                      </button>
                    </div>
                </form>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
  
@endsection