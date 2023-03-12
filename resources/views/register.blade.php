@extends('layouts.master')
@section('title', 'About Us')

@section('content')
 <section id="contant" class="contant main-heading" style="padding-bottom:0;margin-bottom:5%;position:relative;z-index:1;">
         <div class="aboutus">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                     <div class="col-md-4 col-sm-4 col-xs-12 shadow-lg p-3 mb-5 bg-white rounded">
                        <form>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                                <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example1" class="form-control" />
                                    <label class="form-label" for="form3Example1">First name</label>
                                </div>
                                </div>
                                <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example2" class="form-control" />
                                    <label class="form-label" for="form3Example2">Last name</label>
                                </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
                            </form>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection