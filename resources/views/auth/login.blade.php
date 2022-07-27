@extends('layouts.app')

@section('content')
    <div class="card-body p-4 p-sm-5">
        <h5 class="card-title text-center">Вход </h5>
        <p class="card-text mb-5 text-center">Добро пожаловать на MSFO-Shareit.uz!</p>
        <form class="form-body" action="{{route('login')}}" method="POST">
           @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label>Телефон номер</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-envelope-fill"></i></div>
                        <input type="text" name="phone" class="form-control radius-30 ps-5 phone" placeholder="Введите номер телефона ...">
                    </div>
                </div>
                <div class="col-12">
                    <label>Пароль</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-lock-fill"></i></div>
                        <input type="password" name="password" class="form-control radius-30 ps-5" placeholder="Введите пароль">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Запмнить</label>
                    </div>
                </div>
                <div class="col-6 text-end"> <a href="">Забыли пароль ?</a>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary radius-30">Вход</button>
                    </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">У вас ещё нет аккаунта ? <a href="{{route('register')}}">Зарегистрироваться</a></p>
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
