@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Тесты и Вопросы</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Добавить тест</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <form action="{{route('addQuestions')}}" method="post">
            @csrf
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Basic example</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3"> <span class="input-group-text">Ques</span>
                            <textarea class="form-control" name="ques" aria-label="With textarea"></textarea>
                        </div>
                        <div class="form-check-danger form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="ResultOrAbcd" id="ResultOrAbcd" onclick="FuncRes()">
                            <label class="form-check-label" for="ResultOrAbcd">Checked switch checkbox input</label>
                        </div>
                    </div>
                </div>
                <div class="card" id="ResultAbcd" style="display: block">
                    <div class="card-body">
                        <div class="input-group mb-3"> <span class="input-group-text">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ques_res" value="a"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">A</label>
                                </div>
                            </span>
                            <textarea class="form-control" name="ques_a_text" aria-label="With textarea"></textarea>
                        </div>
                        <div class="input-group mb-3"> <span class="input-group-text">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ques_res" value="b"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">B</label>
                                </div>
                            </span>
                            <textarea class="form-control" name="ques_b_text" aria-label="With textarea"></textarea>
                        </div>
                        <div class="input-group mb-3"> <span class="input-group-text">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ques_res" value="c"
                                        id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">C</label>
                                </div>
                            </span>
                            <textarea class="form-control" name="ques_c_text" aria-label="With textarea"></textarea>
                        </div>
                        <div class="input-group mb-3"> <span class="input-group-text">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ques_res" value="d"
                                        id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault4">D</label>
                                </div>
                            </span>
                            <textarea class="form-control" name="ques_d_text" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card" id="ResultText" style="display: none">
                    <div class="card-body">
                        <div class="input-group mb-3"> <span class="input-group-text">Result
                            </span>
                            <textarea class="form-control" name="result_text" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select mb-3" name="lang_id" aria-label="Default select example">
                                            <option value="1">Uz</option>
                                            <option value="2">Ru</option>
                                            <option value="3">En</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" style="width: 100%"><i class="lni lni-save"></i>
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
    <script>
        function FuncRes() {
            if (document.getElementById("ResultOrAbcd").checked == true) {
                document.getElementById("ResultAbcd").style.display = "none";
                document.getElementById("ResultText").style.display = "block";
            } else {
                document.getElementById("ResultAbcd").style.display = "block";
                document.getElementById("ResultText").style.display = "none";
            }
        }
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
