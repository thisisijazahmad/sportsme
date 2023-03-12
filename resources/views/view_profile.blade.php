@extends('layouts.master')
@section('title', 'View Profile')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/social.css') }}">
    <style>
          li {
            background: none;
        }
    </style>
@endpush
@php

if(isset(Auth::user()->id)){
  $url = 'follow/'.$user_data->id;
  $donate_now = 'donate_now/'.$user_data->id;
  $message = 'message/'.$user_data->id;
}else{
$url = 'login';
  $donate_now = 'donate_now/'.$user_data->id;
  $donate_now = 'login';
  $message = 'login';

}
$value = Cookie::get('follow');
if (isset($value))
   $follow = $value;
else
$follow = 'Follow';
@endphp

@section('content')
    <section class="profile-pg">
        <div class="container-fluid">
            <div class="row  px-4">
                <div class="col-md-12">
                    <img src="{{ asset('player/' . $user_data->profile_image) }}" height="500px"alt="">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row profile-data">
                <div class="col-md-3 profile-pic">
                    <img src="{{ asset('player/' . $user_data->profile_image) }}" alt="">
                </div>
                <div class="col-md-6 profile-info">
                    <h1>{{ $user_data->first_name ?? '' }} {{ $user_data->last_name ?? '' }}</h1>
                    <p>
                        <span>4.5</span>
                        <b>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </b>
                    </p>
                    <h6>{{ $user_data->about_me ?? '' }}</h5>
                        <button class="pro-edit">Edit Profile</button>
                </div>

                <div class="col-md-3 profile-btn">
                    @php
                        $url = url('view_profile/'.$user_data->id);
                            $shareComponent = \Share::page(
                                $url,
                                'Kindly support me',
                            )
                                ->facebook()
                                ->twitter()
                                ->whatsapp();
                    @endphp

                    <a href="{{url($url)}}"><button>{{$follow}}</button></a>
                    {!! $shareComponent !!}
                   <button class="share-btn">Share</button>
                    <a href="{{url($donate_now)}}"><button  class="modal-box-show btn btn-primary">Donate Now</button></a>
                    <a href="{{url($message)}}"><button class="box-msg">Messages</button></a>

                </div>
                <div class="col-md-3 profile-follow-set">
                    <div class="profile-follow">
                        <h5>Followers</h5>
                        <p>820</p>
                    </div>
                    <div class="profile-follow">
                        <h5>Following</h5>
                        <p>147</p>
                    </div>
                </div>
                <div class="col-md-9 profile-detail-set">
                    <div class="profile-detail">
                        <i class="fa-sharp fa-solid fa-file-lines"></i>
                        <p>info</p>
                    </div>
                    <div class="profile-detail active">
                        <i class="fa fa-book"></i>
                        <p>Feed</p>
                    </div>
                    <div class="profile-detail">
                        <i class="fa-solid fa-calendar-days"></i>
                        <p>Agenda</p>
                    </div>
                    <div class="profile-detail">
                        <i class="fa fa-paperclip"></i>
                        <p>Resume</p>
                    </div>
                </div>
                <div class="col-md-3 pt-5 set-on-991">
                    <div class="row">
                        <div class="col-md-12 px-0 share-like-lft text-center">
                            <a href="{{ $user_data->f_link ?? 'https://www.facebook.com' }}" target="_blank"><img
                                    src="{{ asset('assets/image/facebook.png') }}" alt=""></a>
                            {{-- <span>6k</span> --}}
                            <a href="{{ $user_data->t_link ?? 'https://www.twitter.com' }}" target="_blank"><img
                                    src="{{ asset('assets/image/twitter.png') }}" alt=""></a>
                            {{-- <span>4k</span> --}}
                            <a href="{{ $user_data->insta_link ?? 'https://www.instagram.com' }}" target="_blank"><img
                                    src="{{ asset('assets/image/instagram.png') }}" alt=""
                                    style="height:32px;"></a>
                            {{-- <span>2k</span> --}}
                        </div>
                        <div class="col-md-12 project-img">
                            <h5>Projects</h5>
                            <img src="{{ asset('assets/image/imggggggg.jpg') }}" alt="">
                            <img src="{{ asset('assets/image/istockphoto-1171084311-612x612.jpg') }}" alt="">
                            <img src="{{ asset('assets/image/tennis-ball-tennis-court-photo-44444538.jpg') }}"
                                alt="">
                            <img src="{{ asset('assets/image/istockphoto-817164728-612x612.jpg') }}" alt="">
                            <img src="{{ asset('assets/image/photo-1602211844066-d3bb556e983b.jpg') }}" alt="">
                            <img src="{{ asset('assets/image/images (2).jpg') }}" alt="">
                        </div>
                        <div class="col-md-12 profiles-add">
                            <p><i class="fa-regular fa-star"></i> ADD <span>More</span></p>
                            <div class="profiles-add-1">
                                <div class="profile-add-1-img">
                                    <img src="{{ asset('assets/image/pro.jpg') }}" alt="">
                                </div>
                                <div class="profile-mid-data">
                                    <p>Lorem ipsum dolor</p>
                                    <h6>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </h6>
                                </div>
                                <button><img src="{{ asset('assets/image/download (1).png') }}" alt=""></button>
                            </div>
                            <div class="profiles-add-1">
                                <div class="profile-add-1-img">
                                    <img src="{{ asset('assets/image/man-388104_960_720.webp') }}" alt="">
                                </div>
                                <div class="profile-mid-data">
                                    <p>Lorem ipsum dolor</p>
                                    <h6>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </h6>
                                </div>
                                <button><img src="{{ asset('assets/image/download (1).png') }}" alt=""></button>
                            </div>
                            <div class="profiles-add-1">
                                <div class="profile-add-1-img">
                                    <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                                </div>
                                <div class="profile-mid-data">
                                    <p>Lorem ipsum dolor</p>
                                    <h6>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </h6>
                                </div>
                                <button><img src="{{ asset('assets/image/download (1).png') }}" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 set-off-991">
                    @foreach ($player_data as $player)
                        <div class="profile-center-div">
                            <div class="col-md-12 d-flex profile-pg-section">
                                <img src="{{ asset('player/' . $user_data->profile_image) }}" alt="">
                                <h6>{{ $player->first_name ?? '' }}</h6>
                            </div>
                            <div class="col-md-12 mian-pro">
                                <img src="{{ asset('player/' . $player->player_img_videos) }}" width="370px"
                                    height="370px" alt="">
                            </div>
                            <div class="col-md-12 mian-pro-lk">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>{{ $player->description ?? '' }}</h5>
                                    </div>
                                    <div class="col-md-6 mian-pro-lk-2">
                                        <p><i class="fa-solid fa-star"></i> 36</p>
                                        <p><i class="fa fa-commenting"></i> 4</p>
                                        <p><i class="fa-solid fa-share"></i> 5</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3 div-bottom mb-3">
                    <div class="col-md-12 profiles-add company-info">
                        <h5>WHO TO FOLLOW <span>More</span></h5>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/pro.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>Frank jon</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/man-388104_960_720.webp') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>David Miller</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>John Cena</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>Angelina John</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>Jack</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 profiles-add invisible-add">
                    <p><i class="fa-regular fa-star"></i> ADD <span>More</span></p>
                    <div class="profiles-add-1">
                        <div class="profile-add-1-img">
                            <img src="{{ asset('assets/image/pro.jpg') }}" alt="">
                        </div>
                        <div class="profile-mid-data">
                            <p>Lorem ipsum dolor</p>
                            <h6>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </h6>
                        </div>
                        <button><img src="{{ asset('assets/image/download (1).png') }}" alt=""></button>
                    </div>
                    <div class="profiles-add-1">
                        <div class="profile-add-1-img">
                            <img src="{{ asset('assets/image/man-388104_960_720.webp') }}" alt="">
                        </div>
                        <div class="profile-mid-data">
                            <p>Lorem ipsum dolor</p>
                            <h6>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </h6>
                        </div>
                        <button><img src="{{ asset('assets/image/download (1).png') }}" alt=""></button>
                    </div>
                    <div class="profiles-add-1">
                        <div class="profile-add-1-img">
                            <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                        </div>
                        <div class="profile-mid-data">
                            <p>Lorem ipsum dolor</p>
                            <h6>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </h6>
                        </div>
                        <button><img src="{{ asset('assets/image/download (1).png') }}" alt=""></button>
                    </div>
                </div>
                <div class="col-md-6 invisible-add-1" style="padding-right:0px; margin-top:20px">
                    <div class="col-md-12 profiles-add company-info">
                        <h5>WHO TO FOLLOW <span>More</span></h5>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/pro.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>Frank jon</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/man-388104_960_720.webp') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>David Miller</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>John Cena</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>Angelina John</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="profiles-add-1">
                            <div class="profile-add-1-img">
                                <img src="{{ asset('assets/image/download.jpg') }}" alt="">
                            </div>
                            <div class="profile-mid-data">
                                <h6>Jack</h6>
                                <p>Lorem ipsum dolor</p>
                            </div>
                            <button><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="modal-box-screen">
                                                                                                                                                                    <div class="modal-box">
                                                                                                                                                                        <div class="col-md-12 d-flex" style="position:relative">
                                                                                                                                                                            <div class="modal-box-support">
                                                                                                                                                                                <h6>12.8K</h6>
                                                                                                                                                                                <p>supporters</p>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="modal-box-share">
                                                                                                                                                                                <h6>14.9K</h6>
                                                                                                                                                                                <p>Shares</p>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="modal-box-followers">
                                                                                                                                                                                <h6>13K</h6>
                                                                                                                                                                                <p>Followers</p>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="modal-share-btn">
                                                                                                                                                                            <a href=""><i class="fa-solid fa-arrow-up-from-bracket"></i> Share</a>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="modal-share-btn-1 support-now-btn">
                                                                                                                                                                            <a href="support-now.html" type="button"><i class="fa-solid fa-hand-holding-dollar"></i> Support now</a>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="row modal-donate">
                                                                                                                                                                            <div class="col-md-2 img-div">
                                                                                                                                                                                <img src="image/man-388104_960_720.webp" alt="">
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="col-md-9">
                                                                                                                                                                                <p>Aaron Ozguzel</p>
                                                                                                                                                                                <div class="row">
                                                                                                                                                                                    <div class="col-md-2">
                                                                                                                                                                                        <p>5&#163;</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-10">
                                                                                                                                                                                        <p> <span><i class="fa-solid fa-circle"></i></span>a day ago</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="row modal-donate">
                                                                                                                                                                            <div class="col-md-2 img-div">
                                                                                                                                                                                <img src="image/man-388104_960_720.webp" alt="">
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="col-md-9">
                                                                                                                                                                                <p>Aaron Ozguzel</p>
                                                                                                                                                                                <div class="row">
                                                                                                                                                                                    <div class="col-md-2">
                                                                                                                                                                                        <p>&#163;5</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-md-10">
                                                                                                                                                                                        <p> <span><i class="fa-solid fa-circle"></i></span>2 days ago</p>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="donate-btn">
                                                                                                                                                                            <button>See All</button>
                                                                                                                                                                            <button><i class="fa-regular fa-star"></i> See Top Donations</button>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </section> -->
    <section class="message-box">
        <div class="container-fluid">
            <div class="modal-box-3">

                <h2>Account Information</h2>
                <form action=""></form>
                <div class="row">

                    <div class="col-md-6">
                        <input type="text" name="" id="" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" id="" placeholder="Second Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" id="" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" id="" placeholder="Mobile Number">
                    </div>
                    <div class="col-md-12">
                        <textarea name="" id="" placeholder="Mesaage"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Send">
                    </div>
                </div>
                </form>

            </div>
        </div>
    </section>
    <section class="edit-profile">
        <div class="container">
            <div class="profile-box">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="col-md-6">
                        <label for="">Profile Picture</label>
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="" id="file">
                    </div>
                    <div class="col-md-12 edit-profile-image">
                        <img src="{{ asset('player/' . $user_data->profile_image) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <label for="">Cover Image</label>
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="" id="file">
                    </div>
                    <div class="col-md-12 edit-profile-cover">
                        <img src="{{ asset('player/' . $user_data->profile_image) }}" width="230px" height="250px"
                            alt="">
                    </div>
                    <div class="col-md-6">
                        <label for="">Bio</label>
                    </div>
                    <div class="col-md-6">
                        <button>Edit</button>
                    </div>
                    <div class="col-md-12">
                        <p>{{ $user_data->about_me ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".modal-box-show").click(function() {
                $(".modal-box-screen").show();
            });
            $(".close-modal").click(function() {
                $(".modal-box-screen-1").hide();
            });
            $(".box-msg").click(function() {
                $(".message-box").show();
            });
            $(".pro-edit").click(function() {
                $(".edit-profile").show();
            });
            $(document).click(function(e) {
                if ($(e.target).is('.modal-box-screen')) {
                    $('.modal-box-screen').fadeOut(500);
                }
            });
            $(document).click(function(e) {
                if ($(e.target).is('.edit-profile')) {
                    $('.edit-profile').fadeOut(500);
                }

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".share-btn").click(function(e) {
                $("#social-links").toggle();
            });
        });
    </script>
@endpush
