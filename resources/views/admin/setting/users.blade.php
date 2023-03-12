@extends('admin.layouts.master')
@section('title', 'Users')
@section('content')
    <div class="col-lg-10 col-md-9 p-4">
        <div class="row ">
            <div class="col-md-12 pl-3 pt-2">
                <div class="pl-3">
                    <h3>Users</h3>
                </div>
            </div>
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
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($users) > 0)
                                    <?php $i = $users->perPage() * ($users->currentPage() - 1); ?>
                                @foreach ($users as $user)
                                        <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td class="py-1">
                                            <img src="{{asset('uploads/'.$user->profile_image)}}" alt="image" width="50px" height="50px">
                                        </td>
                                        <td>{{$user->First_name ?? ''}} {{$user->last_name ?? ''}}</td>
                                        <td>{{$user->email ?? ''}} </td>
                                        <td>{{$user->phone ?? ''}} </td>

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

                        {!!$users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
