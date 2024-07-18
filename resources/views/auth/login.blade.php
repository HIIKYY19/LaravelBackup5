@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" value="{{ old('email') }}" required placeholder="name@example.com" name="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="inputEmail">Email address</label>
                        </div>
                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" placeholder="Password" required name="password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="inputPassword">Password</label>
                        </div>
                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <!-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif -->

                            <button type="submit" class="btn btn-primary mx-auto">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    <br>
                    <center><span >Anda
                                 <a href="{{ route('register') }}">Belum Punya Akun</a>?</span></center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
