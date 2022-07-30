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
                            <th>Пользователь</th>
                            <th>Задача</th>
                            <th>Время</th>
                            <th width="120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $item)
                            <tr>
                                <td class="fw-bold text-center">
                                    {{ $results->currentPage() * 10 - 10 + $loop->index + 1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->mavzu->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('balltoresult',['id' => $item->id]) }}" type="button" class="btn btn-sm btn-primary"><i class="bx bx-edit-alt"></i></a>
                                </td>
                            </tr>
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
                        {{ $results->withQueryString()->links() }}
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
