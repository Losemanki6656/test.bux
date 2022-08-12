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
        <form action="{{ route('AddThem') }}" method="post">
            @csrf
            <div class="col-xl-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for=""> Выберите название</label>
                            <input type="text" class="form-control" name="name" placeholder="Введите название задач">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for=""> Выберите тему</label>
                                    <select name="them_id" class="form-select">
                                        @foreach ($themes as $them)
                                            <option value="{{ $them->id }}">{{ $them->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for=""> Количество задач</label>
                                    <input type="number" class="form-control" name="text2" placeholder="Введите количество задач">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Вопрос</label>
                            <textarea class="ckeditor form-control" id="ques" name="text1"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                               <div class="row">
                                    <div class="col">
                                        <input type="number" name="ball" placeholder="Ввидите Балл" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <input type="number" name="time_count" placeholder="Ввидите время(минут)" class="form-control" required>
                                    </div>
                               </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" style="width: 100%"><i
                                                class="lni lni-save"></i>
                                            Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('ques', {
            filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
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
