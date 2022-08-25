@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Пользователи</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
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
                            <th>Тема</th>
                            <th>Ниминование</th>
                            <th>Зарегистировал</th>
                            <th>Статус</th>
                            <th width="120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td class="fw-bold text-center">
                                    {{ $users->currentPage() * 10 - 10 + $loop->index + 1 }}</td>
                                <td>{{ $item->tema->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="text-success fw-bold"> Активно </span>
                                    @else
                                        <span class="text-danger fw-bold"> Не активно </span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <a data-bs-toggle="modal" data-bs-target="#status{{ $item->id }}" type="button"
                                        class="btn btn-sm btn-primary"><i class="bx bx-edit-alt"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="status{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('editStatusMavzu',['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Статус</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <select name="st_status" class="form-select">
                                                    <option value="1"> Активно </option>
                                                    <option value="0"> Не Активно </option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>

                                    </div>
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
                        {{ $users->withQueryString()->links() }}
                    </form>
                </div>
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
