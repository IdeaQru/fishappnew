@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <!-- Section -->
    <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <p class="text-center">
                    <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Back to homepage
                    </a>
                </p>
                <div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Create Account</h1>
                            </div>
                            <form action="{{ route('register.process') }}" class="mt-4" method="POST">
    @csrf
    <!-- Nama -->
    <div class="form-group mb-4">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group mb-4">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Role (Opsional) -->
    <div class="form-group mb-4">
        <label for="role">Role</label>
        <select name="role" class="form-control" id="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        @error('role')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group mb-4">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Konfirmasi Password -->
    <div class="form-group mb-4">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Daftar</button>
    </div>
</form>


                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">
                                    sudah punya akun ?
                                    <a href="{{ route('login') }}" class="fw-bold">Login here</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
