<!doctype html>
<html lang="en" class="minimal-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />

    <title>MSFO</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="search-toggle-icon d-xl-none ms-auto">
                    <i class="bi bi-search"></i>
                </div>
                <form class="searchbar d-none d-xl-flex ms-auto">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i
                            class="bi bi-search"></i></div>
                    <input class="form-control" type="text" placeholder="Type here to search">
                    <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i
                            class="bi bi-x-lg"></i></div>
                </form>
                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center gap-1">
                                    <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img"
                                        alt="">
                                    <div class="user-name d-none d-sm-block">{{ Auth::user()->name }}</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" alt=""
                                                class="rounded-circle" width="60" height="60">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->name }}</h6>
                                                <small
                                                    class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->phone }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper">
            <div class="iconmenu">
                <div class="nav-toggle-box">
                    <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
                </div>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboards">
                        <button class="nav-link {{ strpos(url()->current(), 'home') ? 'active' : '' }}"
                            data-bs-toggle="pill" data-bs-target="#pills-dashboards" type="button"><i
                                class="bi bi-house-door-fill"></i></button>
                    </li>
                    @can('vchd')
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Application">
                            <button class="nav-link {{ strpos(url()->current(), 'Questions') ? 'active' : '' }}"
                                data-bs-toggle="pill" data-bs-target="#pills-application" type="button"><i
                                    class="bi bi-grid-fill"></i></button>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Application">
                            <button class="nav-link {{ strpos(url()->current(), 'Administration') ? 'active' : '' }}"
                                data-bs-toggle="pill" data-bs-target="#pills-admin" type="button"><i
                                    class="lni lni-cog"></i></button>
                        </li>
                    @endcan
                </ul>
            </div>
            <div class="textmenu">
                <div class="brand-logo">
                    <img src="{{ asset('assets/images/brand-logo-2.png') }}" width="140" alt="" />
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade {{ strpos(url()->current(), 'home') ? 'active show' : '' }}"
                        id="pills-dashboards">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">Dashboards</h5>
                                </div>
                                <small class="mb-0">Некоторый заполнитель контента</small>
                            </div>
                            <a href="{{ route('home') }}"
                                class="list-group-item {{ url()->current() == route('home') ? 'active' : '' }}"><i
                                    class="lni lni-home"></i>Главное меню</a>
                            <a href="{{ route('starttest') }}"
                                class="list-group-item {{ url()->current() == route('starttest') ? 'active' : '' }}"><i
                                    class="lni lni-bolt"></i>Начать тест</a>
                            <a href="{{ route('starttask') }}"
                                class="list-group-item {{ url()->current() == route('starttask') ? 'active' : '' }}"><i
                                    class="lni lni-bolt"></i>Вопросы</a>
                            <a href="{{ route('results') }}"
                                class="list-group-item {{ url()->current() == route('results') ? 'active' : '' }}"><i
                                    class="bi bi-bar-chart-line"></i>Резултаты</a>
                        </div>
                    </div>
                    @can('vchd')
                        <div class="tab-pane fade {{ strpos(url()->current(), 'Questions') ? 'active show' : '' }}"
                            id="pills-application">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-0">Тесты и Вопросы</h5>
                                    </div>
                                    <small class="mb-0">Некоторый заполнитель контента</small>
                                </div>
                                <a href="{{ route('questions') }}"
                                    class="list-group-item {{ url()->current() == route('questions') ? 'active' : '' }}"
                                    class="list-group-item">
                                    <i class="lni lni-database"></i> Тесты</a>
                                <a href="{{ route('addQues') }}"
                                    class="list-group-item {{ url()->current() == route('addQues') ? 'active' : '' }}"><i
                                        class="lni lni-circle-plus">
                                    </i> Добавить вопрос</a>
                                <a href="{{ route('folders') }}"
                                    class="list-group-item {{ url()->current() == route('folders') ? 'active' : '' }}"
                                    class="list-group-item">
                                    <i class="lni lni-database"></i> Темы</a>
                                <a href="{{ route('themes') }}"
                                    class="list-group-item {{ url()->current() == route('themes') ? 'active' : '' }}"> <i
                                        class="lni lni-database"></i> Задание</a>
                                <a href="{{ route('addthemes') }}"
                                    class="list-group-item {{ url()->current() == route('addthemes') ? 'active' : '' }}"><i
                                        class="lni lni-circle-plus"></i>Добавить Задание</a>
                                <a href="{{ route('addTask') }}"
                                    class="list-group-item {{ url()->current() == route('addTask') ? 'active' : '' }}"><i
                                        class="lni lni-circle-plus">
                                    </i> Добавить вопрос</a>
                                <a href="{{ route('resultaskview') }}"
                                    class="list-group-item {{ url()->current() == route('resultaskview') ? 'active' : '' }}">
                                    <i class="lni lni-circle-plus">
                                    </i> Не проверинные</a>

                            </div>
                        </div>
                        <div class="tab-pane fade {{ strpos(url()->current(), 'Administration') ? 'active show' : '' }}"
                            id="pills-admin">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-0">Administration</h5>
                                    </div>
                                    <small class="mb-0">Some placeholder content</small>
                                </div>
                                <a href="{{ route('testcount') }}"
                                    class="list-group-item {{ url()->current() == route('testcount') ? 'active' : '' }}"
                                    class="list-group-item">
                                    <i class="lni lni-database"></i> Test Count</a>
                                <a href="{{ route('users') }}"
                                    class="list-group-item {{ url()->current() == route('users') ? 'active' : '' }}"
                                    class="list-group-item">
                                    <i class="lni lni-database"></i> Пользователи </a>
                                <a href="{{ route('statusMavzu') }}"
                                    class="list-group-item {{ url()->current() == route('statusMavzu') ? 'active' : '' }}"
                                    class="list-group-item">
                                    <i class="lni lni-database"></i> Задачи </a>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </aside>

        <main class="page-content">
            @yield('content')
        </main>

        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                    class="bi bi-paint-bucket me-0"></i></button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1">
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme"
                            value="option3">
                        <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                    </div>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme"
                            value="option3" checked>
                        <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end switcher-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @yield('scripts')
    @stack('scripts')

</body>


<!-- Mirrored from codervent.com/skodash/demo/tabular-menu/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jul 2022 08:35:56 GMT -->

</html>
