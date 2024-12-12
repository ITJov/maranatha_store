@extends('user-dashboard.master-user')
@section('body-class', 'profile-background background-img')
@section('content')
    <div class="row py-5">
        <div class="col-2"></div>
        <div class="col-4">
            <div class="profile-title mb-3">
                <p><span class="color-primary">USER</span> PROFILE</p>
            </div>
            <div class="ms-4 mb-3">
                <p class="m-0">Full Name</p>
                <div class="card">
                    <div class="card-body">
                        User Full Name
                    </div>
                </div>
            </div>
            <div class="ms-4 mb-5">
                <p class="m-0">Email</p>
                <div class="card">
                    <div class="card-body">
                        User Email
                    </div>
                </div>
            </div>
            <a class="ms-4 px-4 py-2 btn btn-success">Reset Password</a>
        </div>
        <div class="col-6 ps-5 p-0">
            <img class="profile-icon" src="{{ asset('assets/images/profile-icon.png') }}" alt="">
        </div>
    </div>

@endsection