@extends('user-dashboard.master-user')
@section('body-class', 'reset-password-background background-img')
@section('add-certain', 'd-flex align-items-center')
@section('content')
    <div class="row w-100 py-5">
        <div class="col-3"></div>
        <div class="col-5 ms-5">
            <div class="reset-password-title">
                <p>RESET <span class="color-primary">PASSWORD</span></p>
            </div>
            <form class="mt-3" method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="ms-5 mb-4">
                    <p class="m-0 mb-2 fw-500 fs-5">Current Password :</p>
                    <div class="card border-0 box-shadow rounded-4 mt-3">
                        <div class="card-body text-capitalize fs-5 px-4">
                            <input class="password-input" type="password" name="current_password"
                                   placeholder="Enter current password" id="old-password">
                            @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="ms-5 mb-4">
                    <p class="m-0 mb-2 fw-500 fs-5">New Password :</p>
                    <div class="card border-0 box-shadow rounded-4 mt-3">
                        <div class="card-body text-capitalize fs-5 px-4">
                            <input class="password-input" type="password" name="new_password"
                                   placeholder="Enter new password" id="new-password">
                            @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="ms-5 mb-4">
                    <p class="m-0 mb-2 fw-500 fs-5">Confirm Password :</p>
                    <div class="card border-0 box-shadow rounded-4 mt-3">
                        <div class="card-body text-capitalize fs-5 px-4">
                            <input class="password-input" type="password" name="new_password_confirmation"
                                   placeholder="Confirm new password" id="confirm-password">
                        </div>
                    </div>
                </div>
                <div class="ms-5 mt-5">
                    <a class="px-4 py-2 btn background-primary" href="/user-profile/index"><span
                                class="fw-500 text-light">CANCEL</span></a>
                    <button class="btn btn-success py-2 px-4 ms-3" type="submit">CONFIRM</button>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>

    <!-- Ikon WhatsApp -->
    <a href="https://wa.me/62881023373000" target="_blank">
        <div class="whatsapp-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-whatsapp text-light fs-2"></i>
        </div>
    </a>
@endsection
