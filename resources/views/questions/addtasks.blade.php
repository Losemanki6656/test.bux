@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Forms</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Tasks</li>
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
    <div class="row">
        <form action="{{route('addTaskSucc')}}" method="post">
            @csrf
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Basic example</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3"> <span class="input-group-text">Ques</span>
                            <textarea class="form-control" name="ques" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3"> <span class="input-group-text">Result
                            </span>
                            <textarea class="form-control" name="result" aria-label="With textarea"></textarea>
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
                                            Save</button>
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
