@extends('layout')

@section('title', 'Dashboard')

@section('content')
<!-- Page Background -->
<div class="dashboard-page">

    <!-- Navbar Top -->
    <nav class="navbar-dashboard">
        <div class="container-navbar">
            <a href="/dashboard" class="nav-logo">Dashboard</a>
            <div class="nav-right">
                <span class="welcome-text">Welcome, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="dashboard-content">
        <h1>Dashboard</h1>
        <p>Manage your formations and profile easily.</p>
        <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
        <a href="/formations" class="btn-view">View Formations</a>

        @if(Auth::user()->hasAnyRole([\App\Models\User::ROLE_SUPER_ADMIN, \App\Models\User::ROLE_ADMIN]))
            <a href="{{ route('admin.dashboard') }}" class="btn-view mt-3" style="display:inline-block;">Admin Dashboard</a>
        @endif
    </div>

</div>

<style>
/* Page background */
.dashboard-page {
    min-height: 100vh;
    background-color: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Navbar */
.navbar-dashboard {
    width: 100%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    padding: 15px 30px;
    display: flex;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.container-navbar {
    width: 100%;
    max-width: 1200px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logo / Dashboard link */
.nav-logo {
    color: #fff;
    font-weight: bold;
    font-size: 1.8rem;
    text-decoration: none;
}

/* Right side: welcome + logout */
.nav-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.welcome-text {
    color: #fff;
    font-weight: 600;
}

/* Logout button */
.btn-logout {
    background: linear-gradient(135deg, #ff6a00, #ee0979);
    color: #fff;
    border: none;
    padding: 8px 18px;
    border-radius: 12px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-logout:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

/* Dashboard Content */
.dashboard-content {
    text-align: center;
    padding: 80px 20px;
}

.dashboard-content h1 {
    font-size: 3rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.dashboard-content p {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 30px;
}

/* View Formations button */
.btn-view {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    color: #fff;
    padding: 12px 30px;
    border-radius: 15px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-view:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

/* Responsive */
@media(max-width:768px){
    .container-navbar {
        flex-direction: column;
        gap: 10px;
    }

    .dashboard-content h1 {
        font-size: 2.2rem;
    }
}
</style>
@endsection