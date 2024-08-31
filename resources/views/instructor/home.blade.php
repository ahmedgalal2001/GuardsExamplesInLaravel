@extends('layout.app')
@section('content')
    <div class="container">
        <h1>Home Page Instructor</h1>
        <p>Welcome to the home page</p>
        @php
            $user = Auth::user();
            dd($user);
        @endphp
    </div>
@endsection
