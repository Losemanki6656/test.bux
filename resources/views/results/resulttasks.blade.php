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
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close"></button>
                </div>  
                {{ $tasks->withQueryString()->links() }}

                <label> Вопрос</label>
                {!! $item->ques !!}

                <div class="mb-3">
                    <label> Ответ</label> <br>
                    {!! $item->result !!}
                </div>
            @endforeach
            <div class="mb-3">
                <label>Ваш Ответ</label> <br>
                @foreach ($result as $res)
                    <h6>
                        @if ($res->startMavzu->status_ret == true)
                            <span class="text-danger">(Повтор)</span>
                        @endif
                        {{ $loop->index + 1 }}: {{ $res->result }}

                    </h6>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
