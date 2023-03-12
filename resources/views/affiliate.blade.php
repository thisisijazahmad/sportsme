@extends('layouts.master')
@section('title', 'Events')
@section('content')
<section class="affiliates-form">
    <div class="container">
        <form action="">
            <div class="row">
                <p class="ref-aff">Reference Code</p>
                <div class="col-md-6">
                    <input type="text" name="" id="" disabled value="{{Auth::user()->first_name ?? ''}}" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input type="text" name="" id="" disabled value="{{Auth::user()->last_name ?? ''}}" placeholder="Second Name">
                </div>
                <div class="col-md-6">
                    <input type="text" name="" id="" disabled value="{{Auth::user()->phone ?? ''}}" placeholder="Number">
                </div>
                <div class="col-md-6">
                    <input type="email" name="" id="" disabled value="{{Auth::user()->email ?? ''}}" placeholder="Email">
                </div>
                <div class="col-md-1" style="margin-left:5px;">
                    <i class="fas fa-copy" data-toggle="tooltip" data-placement="top" title="Copy link"style="font-size:20px; cursor:pointer"></i>
                </div>
                <div class="col-md-11 copy-txt" style="width: 90%; overflow:hidden">
                    <input type="text" id="copy-link" value="{{ $link }}" >
                    <button onclick="myFunction()">copy</button>
                </div>
            </div>
        </form>
    </div>
  </section>
@endsection
@push('scripts')
{{-- <script>
    function myFunction() {
      // Get the text field
      var copyText = document.getElementById("copy-link");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      alert("text copied: " + copyText.value);
    }
    </script> --}}
    <script>
        $(document).ready(function(){
            $(".fa-copy").click(function(){
                $("#copy-link").select();
                document.execCommand('copy');
            });

        });
    </script>
@endpush
