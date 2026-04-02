@extends('layout')

@section('title', 'User Role Management')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <h1>User Role Management</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('admin.users.role.update', $user) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                <select name="role" class="form-select form-select-sm" style="width:auto;">
                                    <option value="super-admin" {{ $user->role === 'super-admin' ? 'selected' : '' }}>Super Admin</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
                                </select>
                                <button class="btn btn-sm btn-primary" type="submit">Apply</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
