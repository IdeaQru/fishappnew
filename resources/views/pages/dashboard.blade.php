@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@include('component.sidebar')
@include('component.content')

@auth
<div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h3>Tabel Data Lokasi Persebaran Ikan </h3>
                <h5>Wilayah Laut Jawa</h5>
                <table class="table table-bordered" id="locationsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Status</th>
                            <th>Expired</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($locations ?? [] as $index => $location)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $location['lokasi'] }}</td>
                            <td>{{ $location['longitude'] }}</td>
                            <td>{{ $location['latitude'] }}</td>
                            <td>{{ $location['status'] }}</td>
                            <td>{{ $location['expiry_date'] }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('edit', $location['id']) }}" class="btn btn-primary">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('delete', $location['id']) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No locations available.</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endauth
    @guest
<div class="container mt-4 text-center">
    <h2>Selamat Datang di Peta Persebaran Ikan!</h2>
    <p>Silahkan Login untuk Admin.</p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
    Login
</button>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('login.process')}}" class="mt-4" method="POST">
                        <!-- Form -->
                        @csrf
                        <div class="form-group mb-4">
                            <label for="name">Nama</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </span>
                                <input class="form-control" type="name" name="name" id="name" value="{{ old('name') }}"
                                    required autofocus>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End of Form -->
                        <div class="form-group">
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="password"> Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            @if ($errors->has('loginError'))
                            <div class="alert alert-danger">
                                {{ $errors->first('loginError') }}
                            </div>
                            @endif
                            <button type="submit" class="btn btn-gray-800">Masuk</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
