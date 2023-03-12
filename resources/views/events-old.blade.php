@extends('layouts.master')
@section('title', 'Events')
@section('content')
 <section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">
                  <div class="col-md-3">
                 
                     <div class="team-column style-2" >
                        <img src="images/tennis.jpeg" alt="" >
                        <div class="player-name">
                           <h5>Charles Wheeler</h5>
                        </div>
                        {{-- <div class="overlay">
                           <div class="team-detail-hover position-center-x">
                              <p>Lacus vulputate torquent mollis venenatis quisque suspendisse fermentum primis,</p>
                              <ul class="social-icons style-4 style-5">
                                 <li><a class="facebook" href="#" tabindex="0"><i class="fa fa-facebook"></i></a></li>
                                 <li><a class="twitter" href="#" tabindex="0"><i class="fa fa-twitter"></i></a></li>
                                 <li><a class="youtube" href="#" tabindex="0"><i class="fa fa-youtube-play"></i></a></li>
                                 <li><a class="pinterest" href="#" tabindex="0"><i class="fa fa-pinterest-p"></i></a></li>
                              </ul>
                              <a class="btn blue-btn" href=" /soccer/team-detail.html" tabindex="0">View Detail</a>
                           </div>
                        </div> --}}
                     </div>
                     
                  </div>
                  <div class="col-md-3">
                  
                     <div class="team-column style-2" style="height:250px">
                        <img src="images/football.jpg" alt="">
                        <div class="player-name">
                           {{-- <div class="desination-2">Defender</div> --}}
                           <h5>FootBall</h5>
                           {{-- <span class="player-number">12</span> --}}
                        </div>
                     </div>
                     
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2">
                        <img src="images/rugby.jpg" alt="">
                        <div class="player-name">
                           {{-- <div class="desination-2">Defender</div> --}}
                           <h5>Rugby</h5>
                           {{-- <span class="player-number">12</span> --}}
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2">
                        <img src="images/boxing.jpeg" alt="">
                        <div class="player-name">
                           
                           <h5>Boxing</h5>
                           
                        </div>
                     </div>
                  </div>

                  
               </div>
         </div>
      </section>
@endsection