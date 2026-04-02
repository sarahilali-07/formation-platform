@extends('layout')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5 animate__animated animate__fadeInDown">
        <div class="form-container shadow-lg p-4">

            <h2 class="text-center mb-4 text-primary fw-bold shadow-text">Login</h2>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control form-input" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-input" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-gradient w-100 fw-bold">Login</button>
            </form>

            <p class="mt-3 text-center text-secondary">
                Don't have an account? 
                <a href="/register" class="text-decoration-none text-primary fw-bold">Register</a>
            </p>

        </div>
    </div>
</div>

<style>
/* Form container */
.form-container {
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    padding: 30px;
    transition: all 0.3s;
}
.form-container:hover {
    transform: translateY(-5px);
}

/* Inputs */
.form-input {
    border-radius: 10px;
    padding: 12px;
    border: 1px solid #ddd;
    transition: 0.3s;
}
.form-input:focus {
    border-color: #6a0dad;
    box-shadow: 0 0 10px rgba(106,13,173,0.5);
    outline: none;
}

/* Gradient button */
.btn-gradient {
    background: linear-gradient(135deg, #667eea, #764ba2);
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

/* Shadow for titles */
.shadow-text {
    text-shadow: 2px 2px 6px rgba(0,0,0,0.3);
}

/* Responsive */
@media(max-width:768px){
    .form-container {
        margin: 20px;
    }
}
</style>
@endsection