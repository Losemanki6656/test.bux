@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Вопросы</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Добавить вопрос</li>
                </ol>
            </nav>
        </div>

        <div class="ms-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFolder"> <i
                    class="lni lni-plus"></i>Добавить Задача
            </button>
        </div>
    </div>
    <div class="modal fade" id="addFolder" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('AddFolder') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить Задача</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for=""> Введите название</label>
                            <input type="text" class="form-control" name="name" placeholder="Название ...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="best-product p-2" style="height: auto">
                @foreach ($themes as $item)
                    <div class="card radius-10 w-100">
                        <div class="card-body p-0">
                            <div class="best-product-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                        <img src="{{ asset('assets/images/folder.png') }}" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-name mb-1">{{ $item->name }}</h6>
                                        <div class="product-rating mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="sales-count ms-auto">
                                        <button type="button" class="btn btn-warning"> Задача <span
                                                class="badge bg-dark">4</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            @if (\Session::has('msg'))
                @if (Session::get('msg') == 1)

                    Toastify({
                        text: "Successfully Added",
                        duration: 3000,
                        gravity: "bottom",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                @endif
            @endif
        });
    </script>
@endsection
