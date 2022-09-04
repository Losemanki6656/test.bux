@extends('layouts.app')

@section('content')
    <div class="card-body p-4 p-sm-5">
        <h5 class="card-title text-center">Регистрация</h5>
        <p class="card-text text-center">Добро пожаловать на MSFO-Shareit.uz!</p>
        <form class="form-body" action="{{ route('register') }}" method="POST" id="reg">
            @csrf
            <div class="row g-3">
                <div class="col-12 ">
                    <label>Фамилия,Имя,Отчество</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-person-circle"></i></div>
                        <input type="text" class="form-control radius-30 ps-5" name="name" placeholder="Введите ФИО ..." required>
                    </div>
                </div>
                <div class="col-12">
                    <label>Телефон номер</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-envelope-fill"></i></div>
                        <input type="text" class="form-control phone radius-30 ps-5" id="phone_number" name="phone"
                            placeholder="Введите номер телефона ..." required>
                    </div>
                </div>
                <div class="col-12">
                    <label>Пароль</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-lock-fill"></i></div>
                        <input type="password" class="form-control radius-30 ps-5" name="password" placeholder="Введите пароль" required>
                    </div>
                </div>
                <div class="col-12">
                    <label>Подверждения пароль</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-lock-fill"></i></div>
                        <input type="password" class="form-control radius-30 ps-5" name="password_confirmation" placeholder="Подвердите пароль" required>
                    </div>
                </div>
                <div class="col-12 ">
                    <label>Адрес</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-person-circle"></i></div>
                        <input type="text" class="form-control radius-30 ps-5" name="address" placeholder="Введите адрес ..." required>
                    </div>
                </div>
                <div class="col-12 ">
                    <label>Должность</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-person-circle"></i></div>
                        <select class="form-select mb-3 radius-30 ps-5" name="post_id">
                            <option selected value="">Выберите должность</option>
                            <option value="1">Хисобчи</option>
                            <option value="2">Бош хисобчи</option>
                            <option value="3">Иктисодчи</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Я согласен все Условия</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit"
                            class="btn btn-primary radius-30">Зарегистрировать</button>
                    </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">У меня уже есть аккаунт? <a href="{{ route('login') }}">Вход</a></p>
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