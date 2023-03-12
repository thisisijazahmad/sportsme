@extends('layouts.master')
@section('title', 'home')
@section('content')

    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class=""
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"
                    class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"
                    class=""></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active carousel-item-start">
                    <img src="{{ asset('assets/image/slide.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>ITS NEVER <span>GETS EASIER</span> YOU JUSTGET BETTER</h1>
                    </div>
                </div>
                <div class="carousel-item carousel-item-next carousel-item-start">
                    <img src="{{ asset('assets/image/slide.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>ITS NEVER GETS EASIER <span>YOU JUST</span> GET BETTER</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/image/slide.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>ITS NEVER GETS EASIER YOU JUST <span>GET BETTER</span></h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="sp-str">
        <div class="container">
            <div class="row">
                <h1>Get Started</h1>
                <div class="col-md-4">

                    <div class="col-md-12 cir-dv ">
                        <h3>STEP</h3>
                        <h3>01</h3>
                        <img src="image/imageedit_14_5257192238.png" alt="">
                    </div>

                    <h4>Sign up</h4>
                </div>
                <div class="col-md-4">

                    <div class="col-md-12 cir-dv-1">
                        <h3>STEP</h3>
                        <h3>02</h3>
                        <img src="image/imageedit_15_9204888480.png" alt="">
                    </div>

                    <h4>Raise Your Profile</h4>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 cir-dv-2">
                        <h3>STEP</h3>
                        <h3>03</h3>
                    </div>
                    <h4 class="text-center">Kick Start Your Career</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="sp-prog">
        <div class="container">
            <div class="row">
                <h1>Our Programs</h1>
                @foreach ($programs as $program)
                    <div class="col-md-3 sp-prog-set">
                        <a href="{{ url('profile/' . $program->id) }}" style="text-decoration: none; color:white">
                            <img src="{{ asset('uploads/' . $program->image) }}" alt="">
                            <h3>{{ $program->name ?? '' }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
