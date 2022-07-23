@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Forms</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Questions</li>
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
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Minutes</th>
                            <th>Count</th>
                            <th>Result</th>
                            <th class="text-center">Lang</th>
                            <th class="text-center" width="60px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $item)
                            <tr>
                                <td class="fw-bold text-center">
                                    {{ $results->currentPage() * 10 - 10 + $loop->index + 1 }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->time2 }}</td>
                                <td>{{ $item->count }}</td>
                                <td>{{ $item->result }}</td>
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
                                    <button type="button" class="btn btn-sm btn-primary"><i class="bx bx-show"></i></button>
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
@endsection

@section('scripts')
    
@endsection
