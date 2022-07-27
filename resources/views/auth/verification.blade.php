@extends('layouts.app')

@section('content')
    <div class="card-body p-4 p-sm-5">
        <h5 class="card-title text-center">Вход</h5>
        <p class="card-text text-center">See your growth and get consulting support!</p>
        <div class="border p-3 rounded">
            <form class="row g-3" action="{{route('activation')}}" id="reg" method="POST">
                @csrf
                <div class="col-12">
                    <label class="form-label">Код верификации</label>
                    <input type="text" class="form-control verification text-center" id="code" name="verification_code" placeholder="Введите код ...">
                </div>
                <div class="col-12">
                    <button class="btn btn-light" type="button" id="tiles" style="width: 100%"> Отправить смс</button>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="button" onclick="submitForm()" class="btn btn-primary">Активация</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('scripts')
        <script>
            $('.verification').inputmask('999999');
        </script>
        <script>
            let resCode;
            $(document).ready(function() {
                $.ajax({
                        type: 'POST',
                        url: "{{ route('verification') }}",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            init();
                            resCode = response.code;
                            console.log(response);
                        },
                        error: function(response) {

                        }
                    });
            });
            function submitForm() {
                    var code = $('#code').val();
                    if (code == resCode) {
                        document.getElementById('reg').submit();
                    } else {
                        alert("Код верификации не правильно ...");
                    }
                };
        </script>
        <script>
            
        </script>
        <script>
            sec = 60;
            var timecount;

            function init() {
                timecount = setInterval(tick, 1000);
            }
            var countdown = document.getElementById("tiles");

            function tick() {
                sec--;
                if (sec == 0) {
                    countdown.disabled = false;
                    clearInterval(timecount);
                    sec = 10;
                    countdown.innerHTML ="Отправить код";
                } else {
                    countdown.innerHTML = "Отправить код - " + sec + " сек";
                    countdown.disabled = true;
                }

            }
        </script>
    @endsection
