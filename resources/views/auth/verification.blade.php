@extends('layouts.app')

@section('content')
    <div class="card-body p-4 p-sm-5">
        <h5 class="card-title text-center">Sign Up</h5>
        <p class="card-text text-center">See your growth and get consulting support!</p>
        <div class="border p-3 rounded">
            <form class="row g-3">
                <div class="col-12">
                    <label class="form-label">Verification Code</label>
                    <input type="text" class="form-control">
                </div>
               
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
        @endsection

        @section('scripts')
            <script>
                $('.phone').inputmask('(99)-999-99-99');
                $('.verification').inputmask('999999');
            </script>
            <script>
                var resCode;

                function verification() {
                    let phone = $('#phone_number').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('verification') }}",
                        data: {
                            "phone": phone,
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
                };

                function submitForm() {
                    var code = $('#code').val();
                    if (code == resCode) {
                        document.getElementById('reg').submit();
                    } else {
                        console.log(code);
                    }
                };
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
                        countdown.innerHTML = "<i class='lni lni-reload'></i> Send Sms";
                    } else {
                        countdown.innerHTML = "Timer - " + sec;
                        countdown.disabled = true;
                    }

                }
            </script>
        @endsection
