@extends('layout')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5 animate__animated animate__fadeInDown">
        <div class="form-container shadow-lg p-4">

            <h2 class="text-center mb-4 text-success fw-bold shadow-text">Register</h2>

            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control form-input" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control form-input" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-input" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-gradient w-100 fw-bold">Register</button>
            </form>

            <p class="mt-3 text-center text-secondary">
                Already have an account? 
                <a href="/login" class="text-decoration-none text-success fw-bold">Login</a>
            </p>

        </div>
    </div>
</div>

<style>
/* Form container same as login, but different gradient for btn */
.btn-gradient {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 10px;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
}
</style>
@endsection