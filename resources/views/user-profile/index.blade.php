@extends('user-dashboard.master-user')
@section('body-class', 'profile-background background-img')
@section('content')
    <div class="row py-5">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="profile-title mb-3">
                <p><span class="color-primary">USER</span> PROFILE</p>
            </div>
            <div class="ms-4 mb-4">
                <p class="m-0 mb-2 fw-500 fs-5">Full Name</p>
                <div class="card border-0 box-shadow rounded-4">
                    <div class="card-body text-capitalize fs-5">
                        {{$user->name}}
                    </div>
                </div>
            </div>
            <div class="ms-4 mb-5">
                <p class="m-0 mb-2 fw-500 fs-5">Email</p>
                <div class="card border-0 box-shadow rounded-4">
                    <div class="card-body fs-5">
                        {{$user->email}}
                    </div>
                </div>
            </div>
            <a class="ms-4 px-4 py-2 btn btn-success"><span class="fw-500">Reset Password</span></a>
        </div>
        <div class="col-6 d-flex justify-content-center p-0">
            <img class="profile-icon" src="{{ asset('assets/images/profile-icon.png') }}" alt="">
        </div>
    </div>

@endsection