@extends('layouts.master')
@section('title', 'Profile info')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/social.css') }}">
    <style>


        .active {
            color: red !important;
            transition-duration: .6s;
        }
        li {
            background: none;
        }
    </style>
@endpush
@section('content')

    <section class="sc-tb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Player Name</h1>
                </div>
                <div class="col-md-12 input-img">
                    <form action="">
                        <div class="icn-img-1">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input type="search" name="" id="" placeholder="Tennis Player">

                        <div class="icn-img-2">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="ctg-lt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <h1>Category</h1>
                    <div class="category">
                        <label for="">
                            <input type="checkbox" name="" id="">Kids Tennis
                        </label>
                        <label for="">
                            <input type="checkbox" name="" id="">Adult Tennis
                        </label>
                        <label for="">
                            <input type="checkbox" name="" id="">New Player
                        </label>
                        <label for="">
                            <input type="checkbox" name="" id="">Tennis Coaches
                        </label>
                    </div>
                    <h1>Location</h1>
                    <div class="location">
                        <label for="">
                            <input type="checkbox" name="" id="">Scotland
                        </label>
                        <label for="">
                            <input type="checkbox" name="" id="">North East
                        </label>
                        <label for="">
                            <input type="checkbox" name="" id="">North West
                        </label>
                        <label for="">
                            <input type="checkbox" name="" id="">Wales
                        </label>
                    </div>
                </div>
                <div class="col-md-8">
                    @if (filled($half_profiles))
                        @foreach ($half_profiles as $key => $half_profile)
                            <div class="top-tennis-sh">
                                <div class="tennis-player-name">
                                    <h1>{{ $half_profile->first_name }} {{ $half_profile->last_name }}</h1>
                                    <img src="{{ asset('player/' . $half_profile->profile_image) }}" alt="">
                                </div>
                                <p>{{ $half_profile->about_me }}</p>
                                <div class="row share-like">

                                    @php
                                        $url = url('view_profile/'.$half_profile->id);
                                            $shareComponent = \Share::page(
                                                $url,
                                                'Kindly support me',
                                            )
                                                ->facebook()
                                                ->twitter()
                                                ->whatsapp();
                                        @endphp
                                    {!! $shareComponent !!}
                                    <div class="col-md-6">

                                        @if (Auth::user())
                                            <p><span id=heart><i
                                                        class="fa-solid @if (isset($like[$key]) && $like[$key]->status == '1' && $like[$key]->liked_id == $half_profile->id) active @else @endif heart-class fa-heart"
                                                        onclick="likeUnlike({{ Auth::user()->id }},{{ $half_profile->id }})"></i></span>
                                                @if (isset($like[$key]) && $like[$key]->liked_id == $half_profile->id && $like[$key]->status == '1')
                                                    <span
                                                        class="count{{ $half_profile->id }}">{{ count([$like[$key]]) }}</span>
                                                @else
                                                    0
                                                @endif
                                            </p>
                                        @else
                                            <p><span onclick="likeUnlike({{ $user_id }},{{ $half_profile->id }})"><i
                                                        class="fa-solid  @if (isset($like[$key]) && $like[$key]->status == 1 && $like[$key]->liked_id == $half_profile->id) active @else @endif heart-class{{ $half_profile->id }} fa-heart"></i></span>
                                                @if (isset($like[$key]) && $like[$key]->liked_id == $half_profile->id && $like[$key]->status == '1')
                                                    <span
                                                        class="count{{ $half_profile->id }}">{{ count([$like[$key]]) }}</span>
                                                @else
                                                    0
                                                @endif
                                            </p>
                                        @endif
                                        <p><i class="fa-solid fa-share share-btn"></i> </p>


                                    </div>

                                    <div class="col-md-6 share-like-lft">
                                        <a href="{{ $half_profile->f_link ?? 'https://www.facebook.com' }}"
                                            target="_blank"><img src="{{ asset('assets/image/facebook.png') }}"
                                                alt=""></a>
                                        {{--                                        <span>0</span> --}}
                                        <a href="{{ $half_profile->tiktok_link ?? 'https://www.facebook.com' }}"
                                            target="_blank"><img src="{{ asset('assets/image/tiktok.png') }}"
                                                alt=""></a>
                                        {{--                                        <span>0</span> --}}
                                        <a href="{{ $half_profile->t_link ?? 'https://www.twitter.com' }}"
                                            target="_blank"><img src="{{ asset('assets/image/twitter.png') }}"
                                                alt=""></a>
                                        {{--                                        <span>0</span> --}}
                                        <a href="{{ $half_profile->insta_link ?? 'https://www.instagram.com' }}"
                                            target="_blank"><img src="{{ asset('assets/image/instagram.png') }}"
                                                alt="" style="height:32px;"></a>
                                        {{--                                        <span>0</span> --}}
                                        <a href="{{ url('view_profile/' . $half_profile->id) }}"><button type="button">Main
                                                Profile</button></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
                <div class="col-md-2">
                    <div class="wht-player">
                        <h4>WHAT TYPE OF TENNIS PLAYER ARE YOU?</h4>
                        <button>JOIN US</button>
                    </div>
                    <div class="wht-player">
                        <h4>WHAT TYPE OF TENNIS PLAYER ARE YOU?</h4>
                        <button>JOIN US</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        function likeUnlike(user_id, liked_id) {

            var check = $('.heart-class' + liked_id).addClass("active");
            console.log(check);
            $.ajax({
                type: 'POST',
                url: "{{ url('like_unlike') }}",
                data: {
                    user_id: user_id,
                    liked_id: liked_id,

                },
                success: function(data) {
                    console.log([data].length);
                    if (data.status != 0) {
                        $('.heart-class' + data.liked_id).addClass("active");
                        $('.count' + data.liked_id).html([data].length);
                    } else {
                        $('.heart-class' + data.liked_id).removeClass("active");
                        $('.count' + data.liked_id).html([data].length);
                    }

                }
            });


        };
    </script>
    <script>
        $(document).ready(function() {
            $(".share-btn").click(function(e) {
                $("#social-links").toggle();
            });
        });
    </script>

@endpush
