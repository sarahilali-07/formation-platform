<h1>Dashboard</h1>

<p>Welcome, {{ Auth::user()->name }}</p>

<a href="/formations">View Formations</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>