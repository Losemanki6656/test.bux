@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Forms</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Testing ... </li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{route('finishTest',['id' => $uid])}}" method="post" id="finishtest">
        @csrf
        <div class="container" style="margin-bottom: 150px">
            @foreach ($questions as $item)
                <div class="card">
                    <div class="card-body border-bottom">
                        <p class="card-text fw-bold">{{ $loop->index + 1 }} . {!! $item->ques !!}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{ $item->id }}]"
                                onclick="myfunc({{ $item->id }})" value="a" id="radio1{{ $item->id }}">
                            <label class="form-check-label" for="radio1{{ $item->id }}">A)
                                {!! $item->ques_a !!}</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{ $item->id }}]"
                                onclick="myfunc({{ $item->id }})" value="b" id="radio2{{ $item->id }}">
                            <label class="form-check-label" for="radio2{{ $item->id }}">B)
                                {!! $item->ques_b !!}</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{ $item->id }}]"
                                onclick="myfunc({{ $item->id }})" value="c" id="radio3{{ $item->id }}">
                            <label class="form-check-label" for="radio3{{ $item->id }}">C)
                                {!! $item->ques_c !!}</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{ $item->id }}]"
                                onclick="myfunc({{ $item->id }})" value="d" id="radio4{{ $item->id }}">
                            <label class="form-check-label" for="radio4{{ $item->id }}">D)
                                {!! $item->ques_d !!}</label>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </form>


    <div class="test">
        <div class="card ">
            <div class="card-body text-center">
                <button class="btn btn-primary btn-sm" id="tiles"></button>
                @foreach ($questions as $ques)
                    <button class="btn btn-outline-primary btn-sm" disabled
                        id="qu{{ $ques->id }}">{{ $loop->index + 1 }}</button>
                @endforeach
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#finish"
                    class="btn btn-sm btn-danger"> Finish</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="finish" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finish Test</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning" form="finishtest">Finish</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var x = 0;

        function myfunc(id) {
            $('#qu' + id + '').removeClass('btn btn-outline-primary btn-sm');
            $('#qu' + id + '').addClass('btn btn-primary btn-sm');
            x = x + 1;
        }
    </script>
    <script>
        var target_date = new Date().getTime() + ({{ $times }} * 1000);
        var days, hours, minutes, seconds;

        var countdown = document.getElementById("tiles");

        getCountdown();

        window.interval = setInterval(function() {
            getCountdown();
        }, 1000);

        function getCountdown() {

            var current_date = new Date().getTime();
            var seconds_left = (target_date - current_date) / 1000;

            seconds_left = seconds_left % 86400;

            seconds_left = seconds_left % 3600;

            minutes = pad(parseInt(seconds_left / 60));
            seconds = pad(parseInt(seconds_left % 60));

            countdown.innerHTML = "<span>" + minutes + " : </span><span>" + seconds + "</span>";

            if (minutes == 0 && seconds == 0) {
                document.getElementById('finishtest').submit();
            }

        }

        function pad(n) {
            return (n < 10 ? '0' : '') + n;
        }
    </script>
@endsection
