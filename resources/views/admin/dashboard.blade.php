@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <h1>Admin Dashboard</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4 mb-4">
            <h3>Promote Student to Teacher</h3>
            <form method="POST" action="{{ route('admin.dashboard.promote_teacher') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Student Email</label>
                    <input type="email" name="email" class="form-control" placeholder="student@example.com" required>
                </div>
                <button class="btn btn-success">Promote to Teacher</button>
            </form>
        </div>

        <div class="card p-4 mb-4">
            <h3>Student Accounts</h3>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->role }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No students available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(Auth::user()->isSuperAdmin())
            <div class="card p-4">
                <h3>Super Admin Management</h3>
                <p>You can manage all user roles <a href="{{ route('admin.users') }}">here</a>.</p>
                <h4>Admin + Super Admin Accounts</h4>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
