@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@include('component.sidebar')
@include('component.content')

@auth
<div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="locationsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
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
    <h2>Welcome to Our Application!</h2>
    <p>This Is Login For our Admin .</p>
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
                <form method="POST" action="">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="email" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
