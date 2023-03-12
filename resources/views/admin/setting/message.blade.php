@extends('admin.layouts.master')
@section('title', 'Messages')
@section('content')
    <div class="col-lg-10 col-md-9 p-4">
        <div class="row ">
            <div class="col-md-12 pl-3 pt-2">
                <div class="pl-3">
                    <h3>Messages</h3>
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
                                <th>Sender</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($messages) > 0)
                                    <?php $i = $messages->perPage() * ($messages->currentPage() - 1); ?>
                                @foreach ($messages as $message)
                                        <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$message->First_name ?? ''}} {{$message->last_name ?? ''}}</td>
                                        <td>{{$message->message ?? ''}} </td>

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

                        {!!$messages->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
