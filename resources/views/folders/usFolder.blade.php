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
                                        <label><span class="fw-bold text-primary">Создано:</span>{{$item->created_at->format('Y-m-d')}}</label>
                                        <a href="{{ route('ThemesF',['id' => $item->id ]) }}" type="button" class="btn btn-warning"> Задача <span
                                                class="badge bg-dark">{{$item->mavzu->count()}}</span>
                                        </a>
                                       
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
                        text: "У вас нет разрешение чтобы начать тест!",
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
