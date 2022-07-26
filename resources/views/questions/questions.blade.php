@extends('layouts.master')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Тесты и Вопросы</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Тесты</li>
            </ol>
        </nav>
    </div>
</div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">
                    <select id="select_lang" class="form-select">
                        <option value="">Select Language</option>
                        <option value="1" @if (request('lang_id') == 1) selected @endif>Uz</option>
                        <option value="2" @if (request('lang_id') == 2) selected @endif>Ru</option>
                        <option value="3" @if (request('lang_id') == 3) selected @endif>En</option>
                    </select>
                </h5>
                <form class="ms-auto position-relative" action="{{ route('questions') }}">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                    </div>
                    <input class="form-control ps-5" type="text" name="search" placeholder="search"
                        value="{{ request('search') }}">
                </form>
            </div>
            <div class="mt-3">
                <table class="table table-striped table-bordered dataTable">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Ques</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>Result</th>
                            <th>Lang</th>
                            <th width="120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $item)
                            <tr>
                                <td class="fw-bold text-center">
                                    {{ $questions->currentPage() * 10 - 10 + $loop->index + 1 }}</td>
                                <td>{{ $item->ques }}</td>
                                <td>{{ $item->ques_a }}</td>
                                <td>{{ $item->ques_b }}</td>
                                <td>{{ $item->ques_c }}</td>
                                <td>{{ $item->ques_d }}</td>
                                <td class="align-middle fw-bold text-center">{{ $item->result }}</td>
                                <td class="align-middle text-center">
                                    @if ($item->lang_id == 1)
                                        Uz
                                    @elseif($item->lang_id == 2)
                                        Ru
                                    @else
                                        En
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}" class="btn btn-sm btn-secondary"><i class="bx bx-edit-alt"></i></button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}" class="btn btn-sm btn-danger"><i class="bx bx-trash-alt"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{route('EditQues',['id' => $item->id])}}" method="post">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                @if ($item->status_result == false)
                                                    <div class="input-group mb-3"> <span class="input-group-text">Ques
                                                        </span>
                                                        <textarea class="form-control" name="ques" aria-label="With textarea">{{ $item->ques }}</textarea>
                                                    </div>
                                                    <div class="input-group mb-3"> <span class="input-group-text">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ques_res" value="a" id="flexRadioDefault1">
                                                                <label class="form-check-label"
                                                                    for="flexRadioDefault1">A</label>
                                                            </div>
                                                        </span>
                                                        <textarea class="form-control" name="ques_a_text" aria-label="With textarea">{{ $item->ques_a }}</textarea>
                                                    </div>
                                                    <div class="input-group mb-3"> <span class="input-group-text">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ques_res" value="b" id="flexRadioDefault2">
                                                                <label class="form-check-label"
                                                                    for="flexRadioDefault2">B</label>
                                                            </div>
                                                        </span>
                                                        <textarea class="form-control" name="ques_b_text" aria-label="With textarea">{{ $item->ques_b }}</textarea>
                                                    </div>
                                                    <div class="input-group mb-3"> <span class="input-group-text">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ques_res" value="c"
                                                                    id="flexRadioDefault3">
                                                                <label class="form-check-label"
                                                                    for="flexRadioDefault3">C</label>
                                                            </div>
                                                        </span>
                                                        <textarea class="form-control" name="ques_c_text" aria-label="With textarea">{{ $item->ques_c }}</textarea>
                                                    </div>
                                                    <div class="input-group mb-3"> <span class="input-group-text">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ques_res" value="d"
                                                                    id="flexRadioDefault4">
                                                                <label class="form-check-label"
                                                                    for="flexRadioDefault4">D</label>
                                                            </div>
                                                        </span>
                                                        <textarea class="form-control" name="ques_d_text" aria-label="With textarea">{{ $item->ques_d }}</textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group mb-3"> <span class="input-group-text">Ques
                                                        </span>
                                                        <textarea class="form-control" name="ques" aria-label="With textarea">{{ $item->ques }}</textarea>
                                                    </div>
                                                    <div class="input-group mb-3"> <span class="input-group-text">Result
                                                        </span>
                                                        <textarea class="form-control" name="result_text" aria-label="With textarea">{{ $item->result }}</textarea>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{route('DeleteQues',['id' => $item->id])}}" method="post">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Do you really want to delete ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete Item</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">
                        <select name="" id="" class="form-select">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </h5>
                    <form class="ms-auto position-relative">
                        {{ $questions->withQueryString()->links() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#select_lang').change(function(e) {
                let lang_id = $(this).val();
                let url = '{{ route('questions') }}';
                window.location.href = `${url}?lang_id=${lang_id}`;
            })
        </script>
    @endpush
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            @if (\Session::has('msg'))
                @if (Session::get('msg') == 1)
                    Toastify({
                        text: "Successfully Edited",
                        duration: 3000,
                        gravity: "bottom",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                    }).showToast();
                @else
                    Toastify({
                        text: "Successfully Deleted",
                        duration: 3000,
                        gravity: "bottom",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "linear-gradient(to right, #00b09b, #EB4C42)",
                        },
                    }).showToast();
                @endif
            @endif
        });
    </script>
@endsection
