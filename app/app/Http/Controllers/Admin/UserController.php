<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorizeModule('view');

        $query = User::query()
            ->where('organization_id', tenant_id())
            ->with('roles');

        if ($search = $request->string('q')->trim()->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        return view('users.index', [
            'users' => $query->latest()->paginate(20)->withQueryString(),
        ]);
    }

    public function create()
    {
        $this->authorizeModule('create');

        return view('users.form', [
            'user' => null,
            'roles' => Role::query()->forTenant()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorizeModule('create');

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,id'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'organization_id' => tenant_id(),
        ]);

        $user->syncRoles($data['roles'] ?? []);

        return redirect()->route('users.index')->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        $this->authorizeModule('update');
        $this->ensureSameTenant($user);

        return view('users.form', [
            'user' => $user,
            'roles' => Role::query()->forTenant()->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeModule('update');
        $this->ensureSameTenant($user);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'status' => ['required', Rule::in(['active', 'suspended', 'inactive'])],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,id'],
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
        ]);

        if (! empty($data['password'])) {
            $user->update(['password' => $data['password']]);
        }

        $user->syncRoles($data['roles'] ?? []);

        return redirect()->route('users.edit', $user)->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $this->authorizeModule('delete');
        $this->ensureSameTenant($user);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted.');
    }

    private function ensureSameTenant(User $user): void
    {
        abort_unless($user->organization_id === tenant_id(), 404);
    }

    private function authorizeModule(string $action): void
    {
        $user = auth()->user();

        if ($user === null || $user->isSuperAdmin() || $user->hasPermissionTo("user.{$action}")) {
            return;
        }

        abort(403);
    }
}