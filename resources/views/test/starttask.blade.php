@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Forms</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Start Test</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3 g-3">
                        <div class="col">
                            <div class="card radius-10 bg-tiffany mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <i class="bi bi-file-earmark-break-fill"></i>
                                    </div>
                                    <h3 class="text-white">25</h3>
                                    <p class="mb-0 text-white">Pages</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-danger mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <i class="bi bi-hdd-fill"></i>
                                    </div>
                                    <h3 class="text-white">35</h3>
                                    <p class="mb-0 text-white">Posts</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-success mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <h3 class="text-white">16</h3>
                                    <p class="mb-0 text-white">Users</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-dark mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <i class="bi bi-file-earmark-check-fill"></i>
                                    </div>
                                    <h3 class="text-white">18</h3>
                                    <p class="mb-0 text-white">Files</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-purple mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <i class="bi bi-tags-fill"></i>
                                    </div>
                                    <h3 class="text-white">22</h3>
                                    <p class="mb-0 text-white">Categories</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-orange mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <i class="bi bi-chat-left-quote-fill"></i>
                                    </div>
                                    <h3 class="text-white">45</h3>
                                    <p class="mb-0 text-white">Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <form action="{{ route('runtask') }}" method="post">
                            @csrf
                            <div class="text-center mx-auto">
                                <div class="row">
                                    <div class="col">
                                        <select name="lang_id" class="form-select">
                                            <option value="1">Uz</option>
                                            <option value="2">Ru</option>
                                            <option value="3">En</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        @if (true)
                                            <button type="submit" class="btn btn-primary px-5 radius-30"
                                            style="width: 100%">Start</button>
                                        @else
                                            <button type="submit" class="btn btn-warning px-5 radius-30"
                                            style="width: 100%">Continue</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
