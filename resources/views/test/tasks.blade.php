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
            @foreach ($tasks as $item)
                <div class="card radius-10 border-0 border-start border-tiffany border-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1">{{ $item->name }}</p>
                                <h6 class="mb-0 text-tiffany">Количество задач - {{ $item->text2 }}/{{$item->tasks->count()}}</h6>
                            </div>
                            <div class="ms-auto">
                                <label><span
                                        class="fw-bold text-primary">Создано:</span>{{ $item->created_at->format('Y-m-d') }}</label>
                               @if ($status == 0)
                                <a type="button" href="{{route('QuesView',['id' => $item->id])}}" class="btn btn-primary radius-30"><i class="lni lni-eye"></i>
                                        Посмотреть задачи
                                    </a>
                               @elseif($status == 1)
                                <a type="button" href="{{route('QuesView',['id' => $item->id])}}" class="btn btn-warning radius-30"><i class="lni lni-eye"></i>
                                        Продолжить
                                    </a>
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
