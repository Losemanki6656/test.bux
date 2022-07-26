@extends('layouts.app')

@section('content')
    <div class="card-body p-4 p-sm-5">
        <h5 class="card-title text-center">Sign In</h5>
        <p class="card-text mb-5 text-center">See your growth and get consulting support!</p>
        <form class="form-body" action="{{route('login')}}" method="POST">
           @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label>Phone Number</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-envelope-fill"></i></div>
                        <input type="text" name="phone" class="form-control radius-30 ps-5 phone" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-12">
                    <label>Enter Password</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-lock-fill"></i></div>
                        <input type="password" name="password" class="form-control radius-30 ps-5" placeholder="Enter Password">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                    </div>
                </div>
                <div class="col-6 text-end"> <a href="">Forgot Password ?</a>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                    </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">Don't have an account yet? <a href="{{route('register')}}">Sign up here</a></p>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $('.phone').inputmask('(99)-999-99-99');
    </script>
@endsection
