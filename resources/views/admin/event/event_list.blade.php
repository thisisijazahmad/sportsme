@extends('admin.includes.master')
@section('title', 'Events List')
@section('content')
<section>
        <div class="container-fluid">

          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                  <h2 class="mr-40">Events</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <a href="{{url('add_event')}}" class="main-btn success-btn square-btn btn-hover"> <span>Add Event</span></a>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
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
          <!-- menu-listing Wrapper Start -->
          <div class="menu-listing-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="menu-listing-card card-style mb-30">
                  <div class="table-responsive">
                    <table class="menu-listing-table table">
                      <thead>
                        <tr>
                          <th class="service">
                            <h4 class="text-sm text-medium">No</h4>
                          </th>
                           <th class="service">
                            <h4 class="text-sm text-medium">Images</h4>
                          </th>
                          <th class="desc">
                            <h4 class="text-sm text-medium">Title</h4>
                          </th>
                           <th>
                            <h4 class="text-sm text-medium">Tickets</h4>
                          </th>
                          <th>
                            <h2 class="text-sm text-medium">Call Duration</h2>
                          </th>
                            <th>
                            <h2 class="text-sm text-medium">Remaing Duration</h2>
                          </th>
                          <th >
                            <h2 class="text-sm text-medium">Reconnect Limit</h2>
                          </th>
                          <th >
                            <h2 class="text-sm text-medium">Location</h2>
                          </th>
                          <th >
                            <h2 class="text-sm text-medium">Date</h2>
                          </th>
                          <th>
                            <h2 class="text-sm text-medium">Action</h2>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @if (isset($events) > 0)
                        <?php $i = $events->perPage() * ($events->currentPage() - 1); ?>
                        @foreach ($events as $event)
                            <?php $i++; ?>
                        <tr>
                          <td>
                            <p class="text-sm">{{$i}}</p>
                          </td>
                           <td class="min-width">
                            <div class="lead">
                              <div class="lead-image">
                                <img src="{{asset('uploads/'.$event->image)}}" alt=""/>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm">{{$event->title}}</p>
                          </td>
                           <td>
                            <p class="text-sm">{{$event->tickets}}</p>
                          </td>
                          <td>
                            <p class="text-sm">{{$event->call_duration}}</p>
                          </td>
                            <td>
                            <p class="text-sm">{{$event->r_c_limit}}</p>
                          </td>
                          <td>
                            <p class="text-sm">{{$event->reconnect_limit}}</p>
                          </td>
                          <td>
                            <p class="text-sm">{{$event->location}}</p>
                          </td>
                          <td>
                            <p class="text-sm">{{$event->date}}</p>
                          </td>
                          <td>
                            <p class="text-sm">
                              <a href="{{url('add_event/'.$event->id)}}" class="btn btn-primary a-btn-slide-text btn-show"> <span>Edit</span></a>
                              {{-- <a onclick="return confirm('Are you sure?')" href="{{url('delete_employee/'.$event->id)}}" class="btn btn-primary a-btn-slide-text btn-delete"> <span>Delete</span></a> --}}
                            </p>
                          </td>
                        </tr>
                             @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <h2>Record Not Found</h2>
                                    </td>
                                </tr>
                            @endif
                      </tbody>
                    </table>
                  </div>
                  <div class="row mt-5">
                    <div class="col-12">
                      <!-- Pagination -->
                      <nav
                        aria-label="Page navigation example"
                        class="d-flex justify-content-center text-center">

                          {{-- {!!$events->links() !!} --}}

                      </nav>
                    </div>
                  </div>
                </div>

                <!-- End Card -->
              </div>
              <!-- ENd Col -->
            </div>
            <!-- End Row -->
          </div>
          <!-- menu-listing Wrapper End -->
        </div>
        <!-- end container -->
      </section>
  
@endsection