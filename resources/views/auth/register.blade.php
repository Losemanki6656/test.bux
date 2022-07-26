@extends('layouts.app')

@section('content')
    <div class="card-body p-4 p-sm-5">
        <h5 class="card-title text-center">Sign Up</h5>
        <p class="card-text text-center">See your growth and get consulting support!</p>
        <form class="form-body" action="{{ route('register') }}" method="POST" id="reg">
            @csrf
            <div class="row g-3">
                <div class="col-12 ">
                    <label>Name</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-person-circle"></i></div>
                        <input type="text" class="form-control radius-30 ps-5" name="name" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="col-12">
                    <label>Phone Number</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-envelope-fill"></i></div>
                        <input type="text" class="form-control phone radius-30 ps-5" id="phone_number" name="phone"
                            placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="col-12">
                    <label>Enter Password</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-lock-fill"></i></div>
                        <input type="password" class="form-control radius-30 ps-5" name="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <div class="col-12">
                    <label>Confirmation Password</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-lock-fill"></i></div>
                        <input type="password" class="form-control radius-30 ps-5" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="col-12 ">
                    <label>Address</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-person-circle"></i></div>
                        <input type="text" class="form-control radius-30 ps-5" name="address" placeholder="Address" required>
                    </div>
                </div>
                <div class="col-12 ">
                    <label>Post Name</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-person-circle"></i></div>
                        <select class="form-select mb-3 radius-30 ps-5" name="post_id">
                            <option selected value="">Select Post</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">I Agree to the Trems &
                            Conditions</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit"
                            class="btn btn-primary radius-30">Sign in</button>
                    </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign up here</a></p>
                </div>
            </div>

        </form>
    </div>

@endsection

@section('scripts')
<script>
    $('.phone').inputmask('(99)-999-99-99');
</script>

@endsection