@extends('layouts.app') @section('title', 'Login') @section('content')
<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
    <div class="container">
        @if(session()->has('success'))
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            {{ session("success") }}
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
        @endif @if(session()->has('loginError'))
        <div
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
        >
            {{ session("loginError") }}
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
        @endif
        <div
            class="row justify-content-center form-bg-image"
            data-background-lg="{{
                asset('volt/assets/img/illustrations/signin.svg')
            }}"
        >
            <div
                class="col-12 d-flex align-items-center justify-content-center"
            >
                <div
                    class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500"
                >
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h1 class="mb-0 h3">Login Peta Persebaran Ikan</h1>
                    </div>
                    <form
                        action="{{ route('login.process') }}"
                        class="mt-4"
                        method="POST"
                    >
                        @csrf
                        <!-- Name -->
                        <div class="form-group mb-4">
                            <label for="name">Nama</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                            />
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="password"
                                required
                            />
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="form-check mb-4">
                            <input
                                type="checkbox"
                                name="remember"
                                class="form-check-input"
                                id="remember"
                            />
                            <label class="form-check-label" for="remember"
                                >Remember Me</label
                            >
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Masuk
                            </button>
                        </div>
                    </form>
                    <span
                        >Belum punya akun?
                        <a href="{{ route('register.process') }}">Daftar disini</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endsection
</section>
