@extends('layout.app')
@section('content')
    <div class="container">
        <h1>Login Page Parent</h1>
        <form id="form-login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control" id="role">
                    <option value="parent">Parent</option>
                    <option value="instructor">Instructor</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(doument).ready(function() {
            $('#form-login').submit(function(e) {
                e.preventDefault();
                if ($('#role').val() == 'parent') {
                    this.action = "{{ route('parent.login.store') }}";
                } else {
                    this.action = "{{ route('instructor.login.store') }}";
                }
                this.submit();
            });
        });
    </script>
@endpush
