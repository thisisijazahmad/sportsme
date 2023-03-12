@extends('layouts.master')
@section('title', 'Events')
@section('content')
    <section>
        <div class="container-fluid">
            <div class=" mt-5 mb-5">
                <section class="sp-prog">
                    <div class="container">
                        <div class="row">
                            <h2 >Our Events</h2>
                            @foreach ($programs as $program)
                                    <div class="col-md-3 sp-prog-set mt-3">
                                        <a href="{{ url('profile/' . $program->id) }}" style="text-decoration: none; color:white">
                                        <img src="{{ asset('uploads/' . $program->image) }}" alt="">
                                        <h3>{{ $program->name ?? '' }}</h3>
                                        </a>
                                    </div>

                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

