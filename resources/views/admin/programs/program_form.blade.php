@extends('admin.layouts.master')
@section('title', 'Add Program')
@section('content')
    <div class="col-lg-10 col-md-9 p-4">
        <div class="row ">
            <div class="col-md-12 pl-3 pt-2">
                <div class="pl-3">
                    <h3>Add Program Information</h3>
                </div>
            </div>
        </div>

        <!-- start row -->
        <div class="row pl-3 my-4 mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{url('save_program')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$program->id ?? ''}}">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <label >Name</label>
                                    <input type="text" class="form-control" placeholder="Program Name" required name="name" value="{{$program->name??''}}">
                                </div>

                                <div class="col-md-6">
                                    <label >Image</label>
                                        <input type="file" name="image"  class="form-control"/>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-success me-2">Save</button>
                                <a href="{{ url()->previous() }}"><button class="btn btn-danger">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection
