@extends('admin.layouts.master')
@section('title', 'Programs')
@section('content')
    <div class="col-lg-10 col-md-9 p-4">
        <div class="row ">
            <div class="col-md-12 pl-3 pt-2">
                <div class="pl-3">
                    <h3>Programs</h3>
                </div>
            </div>
        </div>

        <div class="text-right mt-2">
            <a href="{{url('programs_add')}}"><button class="btn btn-primary">Add Programs</button></a>
        </div>
        <!-- start third box -->
        <div class="row pl-3 mt-3 mb-5">
            <div class="col-lg-12 mb-2">
                <div class="card">
                    <div class="card-body px-0 py-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Images</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($programs) > 0)
                                    <?php $i = $programs->perPage() * ($programs->currentPage() - 1); ?>
                                @foreach ($programs as $program)
                                        <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td class="py-1">
                                            <img src="{{asset('uploads/'.$program->image)}}" alt="image" width="50px" height="50px">
                                        </td>
                                        <td>
                                            {{$program->name ?? ''}}
                                        </td>

                                        <td>
                                            <a href="{{url('programs_add/'.$program->id)}}" class="btn btn-primary a-btn-slide-text btn-show"> <span>Edit</span></a>
                                        </td>
                                    </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <h2>Record Not Found</h2>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        {!!$programs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
