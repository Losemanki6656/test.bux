@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Test Count</p>
                            <h4 class="my-1">{{$count->count}}</h4>
                            <p class="mb-0 font-13 text-success"> {{$count->test_time}} minutes</p>
                        </div>
                        <div class="widget-icon-large bg-gradient-purple text-white ms-auto" onclick="FuncRes()"><i class="bx bx-edit-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="display: none" id="editedTest">
                <div class="card-body">
                    <form action="{{route('EditTestCount')}}" method="post">
                        @csrf
                        <div class="d-flex align-items-center">
                            <div class="ms-auto">
                                <input type="number" class="form-control" name="count" placeholder="Type Count ..."> 
                            </div>
                            <div class="ms-auto">
                                <input type="number" class="form-control" name="test_time" placeholder="Type Time ..."> 
                            </div>
                            <div class="ms-auto"> <button class="btn btn-primary" type="submit"> <i class="bx bx-save"></i></button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function FuncRes() {
        document.getElementById("editedTest").style.display = "block";
    }
</script>
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
                @endif
            @endif
        });
    </script>
@endsection
