@extends('user-dashboard.master-user')
@section('body-class', 'profile-background background-img')
@section('add-certain', 'd-flex align-items-center')
@section('content')
    <div class="row w-100">
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
            <a class="ms-4 px-4 py-2 btn btn-success" href="/user-profile/resetPassword"><span class="fw-500">Reset Password</span></a>
        </div>
        <div class="col-6 d-flex justify-content-center p-0">
            <img class="profile-icon" src="{{ asset('assets/images/profile-icon.png') }}" alt="">
        </div>
    </div>

    <!-- Ikon WhatsApp -->
    <a href="https://wa.me/62881023373000" target="_blank">
        <div class="whatsapp-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-whatsapp text-light fs-2"></i>
        </div>
    </a>
     <!-- Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">
                        {{ session('success') ? 'Success' : 'Error' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(session('success'))
                        {{ session('success') }}
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
            var feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'));
            feedbackModal.show();
            @endif
        });
    </script>
@endsection