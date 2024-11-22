@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.Login')
@endsection
@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-6">
                    <div class="card p-2 rounded-5">
                        <div class="card-body p-5">
                            <div class="d-flex around-item-center justify-content-between">
                                <div>
                                    <h1>Sign In</h1>
                                    <p class="text-muted m-0">Welcome to Maranatha Store!</p>
                                </div>
                                <img class="logo-login" src="{{ asset('assets/images/logo.png')}}" alt="">
                            </div>
                            <div class="mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label text-muted" for="email">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror border-dark-subtle"
                                               name="email" value="{{ old('email') }}" id="email"
                                               placeholder="Enter Email address">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted" for="userpassword">Password</label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror border-dark-subtle"
                                               name="password" id="userpassword" placeholder="Enter password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check" id="remember-me">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-5 d-flex justify-content-between">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                                password?</a>
                                        @endif
                                        <button class="btn background-primary text-white w-sm waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())

                            </script>
                            Maranatha Store
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
