<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of admin users.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->orderBy('created_at', 'desc')->get();

        $totalAll = User::count();
        $totalSuperAdmin = User::where('role', 'superadmin')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalStaff = User::where('role', 'staff')->count();
        $totalActive = User::where('is_active', true)->count();

        $availablePermissions = User::AVAILABLE_PERMISSIONS;

        return view('admin.users.index', compact(
            'users',
            'totalAll',
            'totalSuperAdmin',
            'totalAdmin',
            'totalStaff',
            'totalActive',
            'availablePermissions'
        ));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $availablePermissions = User::AVAILABLE_PERMISSIONS;

        return view('admin.users.create', compact('availablePermissions'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => ['required', Rule::in(['superadmin', 'admin', 'staff'])],
            'title' => 'nullable|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
            'is_active' => 'nullable|boolean',
        ]);

        $permissions = $request->input('permissions', []);

        // Super Admin gets all permissions by default
        if ($validated['role'] === 'superadmin') {
            $permissions = array_keys(User::AVAILABLE_PERMISSIONS);
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'title' => $validated['title'] ?? 'Staff / Admin',
            'permissions' => $permissions,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Akun user baru berhasil dibuat dengan hak akses yang ditentukan!');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $availablePermissions = User::AVAILABLE_PERMISSIONS;

        return view('admin.users.edit', compact('user', 'availablePermissions'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|string|min:6',
            'role' => ['required', Rule::in(['superadmin', 'admin', 'staff'])],
            'title' => 'nullable|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
            'is_active' => 'nullable|boolean',
        ]);

        $permissions = $request->input('permissions', []);

        if ($validated['role'] === 'superadmin') {
            $permissions = array_keys(User::AVAILABLE_PERMISSIONS);
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->title = $validated['title'] ?? $user->title;
        $user->permissions = $permissions;
        $user->is_active = $request->boolean('is_active', true);

        if (! empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Data user dan hak akses berhasil diperbarui!');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri saat sedang login.');
        }

        if ($user->isSuperAdmin() && User::where('role', 'superadmin')->count() <= 1) {
            return back()->with('error', 'Tidak dapat menghapus Super Admin terakhir pada sistem.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Akun user berhasil dihapus dari sistem.');
    }
}
