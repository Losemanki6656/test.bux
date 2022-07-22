@extends('layouts.master')

@section('content')
    <div class="container">

        @foreach ($questions as $item)
           
                <div class="card">
                    <div class="card-body border-bottom">
                        <p class="card-text">{{ $loop->index + 1 }} . {!! $item->ques !!}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{$item->id}}]" value="a" id="radio1{{$item->id}}">
							<label class="form-check-label" for="radio1{{$item->id}}">{!! $item->ques_a !!}</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{$item->id}}]" value="b" id="radio2{{$item->id}}">
							<label class="form-check-label" for="radio2{{$item->id}}">{!! $item->ques_b !!}</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{$item->id}}]" value="c" id="radio3{{$item->id}}">
							<label class="form-check-label" for="radio3{{$item->id}}">{!! $item->ques_c !!}</label>
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input" type="radio" name="result[{{$item->id}}]" value="d" id="radio4{{$item->id}}">
							<label class="form-check-label" for="radio4{{$item->id}}">{!! $item->ques_d !!}</label>
                        </li>
                    </ul>
                </div>
        @endforeach
    </div>

@endsection

@section('scripts')
@endsection
