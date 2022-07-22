@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Forms</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Testing ... </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        @foreach ($questions as $item)
            <div class="card">
                <div class="card-body border-bottom">
                    <p class="card-text">{{ $loop->index + 1 }} . {!! $item->ques !!}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" value="a"
                            id="radio1{{ $item->id }}">
                        <label class="form-check-label" for="radio1{{ $item->id }}">{!! $item->ques_a !!}</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" value="b"
                            id="radio2{{ $item->id }}">
                        <label class="form-check-label" for="radio2{{ $item->id }}">{!! $item->ques_b !!}</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" value="c"
                            id="radio3{{ $item->id }}">
                        <label class="form-check-label" for="radio3{{ $item->id }}">{!! $item->ques_c !!}</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input" type="radio" name="result[{{ $item->id }}]" value="d"
                            id="radio4{{ $item->id }}">
                        <label class="form-check-label" for="radio4{{ $item->id }}">{!! $item->ques_d !!}</label>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>


    <div class="card" style="width: 100%">
        <div class="card-body">

        </div>
    </div>
@endsection

@section('scripts')
@endsection
