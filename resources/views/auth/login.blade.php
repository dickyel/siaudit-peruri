@extends('layouts.login')

@section('title')
    Login SPIPTL
@endsection

@section('content')

<!-- Page Content -->
<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center row-login">
        <div class="col-lg-6 text-center">
            <img
            src="{{ asset('./sitinjut/images/logo.png') }}"
            alt=""
            class="w-50 mb-4 mb-lg-none"
            />
        </div>
        <div class="col-lg-5">
            

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="mt-3" action="/" method="post">
                @csrf
                <div class="form-group">
                    <label>No Pokok/Email</label>
                    <input
                    type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror w-75" id="email"
                    aria-describedby="emailHelp"
                    />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror w-75" id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button
                    class="btn btn-success btn-block w-75 mt-4"
                    type="submit"
                >
                    Login Ke Akun
                </button>
                <a
                    class="btn btn-signup btn-block w-75 mt-4"
                    href="/forget-password.html"
                >
                    Lupa Password
                </a>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection