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
        {!! $task->text1 !!}
    </div>
    <div class="row">
        <div class="col-3 mx-auto">
                @if ($status == 0)
                    <a href="{{ route('taskrun',['id' => $task->id]) }}" class="btn btn-primary radius-30"> Начать Тест</a>
                @elseif($status == 1)
                    <a href="{{ route('taskrun',['id' => $task->id]) }}" class="btn btn-warning radius-30"> Продолжить Тест</a>
                @endif
        </div>
    </div>
@endsection

@section('scripts')
@endsection
