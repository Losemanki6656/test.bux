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
                <div class="alert border-0 bg-warning alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-dark"><i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-dark fw-bold">
                                 Вопрос - №
                                <button type="button" id="tiles" class="btn btn-dark radius-30"></button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close"></button>
                </div>
                <label class="text-primary">Вопрос</label>
                {!! $result->task->ques !!}

                <label class="text-primary">Решения</label>
                {!! $result->task->result !!}

                <div class="mb-3">
                    <label>Ответ</label>
                    <textarea name="result" class="form-control"> {{ $result->result }} </textarea>
               </div>
               <div class="mb-3">
                    <form action="{{route('taskSucc',['id' => $result->id])}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="number" name="ball" class="form-control" placeholder="Ball">
                            </div>
                            <div class="col">
                                <button name="dan" value="true" class="btn btn-danger" type="submit" style="width: 100%"> Не правильно</button>
                            </div>
                            <div class="col">
                                <button name="succ" value="true" class="btn btn-success" type="submit" style="width: 100%"> Правильно</button>
                            </div>
                        </div>
                    </form>
               </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

