<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorizeSuperAdmin();

        $users = User::orderBy('role')->orderBy('name')->get();

        return view('admin.users', compact('users'));
    }

    public function dashboard()
    {
        $current = auth()->user();
        if (!$current || !$current->hasAnyRole([User::ROLE_SUPER_ADMIN, User::ROLE_ADMIN])) {
            abort(403, 'Unauthorized');
        }

        if ($current->isSuperAdmin()) {
            $students = User::where('role', User::ROLE_STUDENT)->orderBy('name')->get();
            $admins = User::whereIn('role', [User::ROLE_SUPER_ADMIN, User::ROLE_ADMIN])->orderBy('name')->get();
        } else {
            $students = User::where('role', User::ROLE_STUDENT)->orderBy('name')->get();
            $admins = collect();
        }

        return view('admin.dashboard', compact('students', 'admins'));
    }

    public function assignTeacher(Request $request)
    {
        $current = auth()->user();
        if (!$current || !$current->hasAnyRole([User::ROLE_SUPER_ADMIN, User::ROLE_ADMIN])) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        if ($user->role !== User::ROLE_STUDENT) {
            return back()->withErrors(['email' => 'Only students can be promoted to teacher.']);
        }

        $user->update(['role' => User::ROLE_TEACHER]);

        return redirect()->route('admin.dashboard')->with('success', 'Student promoted to teacher successfully.');
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeSuperAdmin();

        $request->validate([
            'role' => 'required|in:super-admin,admin,teacher,student',
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->route('admin.users')->with('success', 'Role updated successfully.');
    }

    protected function authorizeSuperAdmin()
    {
        $current = auth()->user();
        if (!$current || !$current->isSuperAdmin()) {
            abort(403, 'Unauthorized');
        }
    }
}
