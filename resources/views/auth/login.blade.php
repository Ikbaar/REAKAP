@extends('layouts.auth')

@section('title', 'Login – SI Petani REAKAP')

@section('content')
<div class="login-container">
    <div class="login-card">
        <h4 class="text-center fw-bold mb-1">Login SI Petani REAKAP</h4>
        <div class="text-center mb-4">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="login-logo">
        </div>

        @if ($errors->has('login'))
            <div class="alert alert-danger">
                {{ $errors->first('login') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-floating-input">
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="@error('username') invalid @enderror" 
                    value="{{ old('username') }}" 
                    required 
                    autofocus>
                <label for="username">Username</label>
                @error('username')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating-input">
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="@error('password') invalid @enderror" 
                    required>
                <label for="password">Password</label>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</div>
@endsection
