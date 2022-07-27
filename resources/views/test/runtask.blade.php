@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Вопросы</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Вопросы</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="row">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">
                    </h5>
                    <form class="mx-auto position-relative">
                    </form>
                </div>
            </div>
            @foreach ($tasks as $item)
                <div class="alert border-0 bg-warning alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-dark"><i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-dark fw-bold">
                                 Вопрос - №{{ $loop->index + 1 }}
                                <button type="button" id="tiles" class="btn btn-dark radius-30"></button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close"></button>
                </div>
                {{ $tasks->withQueryString()->links() }}
                {!! $item->ques !!}
            @endforeach
           <div class="mb-3">
                <label>Ответ</label>
                <textarea name="" class="form-control"></textarea>
           </div>
           <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <input type="file" class="form-control">
                    </div>
                    <div class="col">
                        <input type="file" class="form-control">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" style="width: 100%"> Отправить Решение</button>
                    </div>
                </div>
           </div>
        </div>
    </div>
@endsection

@section('scripts')
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

            countdown.innerHTML = "Время - <span>" + minutes + " : </span><span>" + seconds + "</span>";

            if (minutes == 0 && seconds == 0) {
                document.getElementById('finishtest').submit();
            }

        }

        function pad(n) {
            return (n < 10 ? '0' : '') + n;
        }
    </script>
@endsection

