<x-app-layout>
    <x-crud-form
        :title="$user ? 'Edit User' : 'New User'"
        :back-url="route('users.index')"
        :form-url="$user ? route('users.update', $user) : route('users.store')"
        :method="$user ? 'PUT' : 'POST'"
        :submit-label="$user ? 'Update User' : 'Create User'"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Full Name" name="name" :value="$user?->name" required />
            <x-forms.input label="Email" name="email" type="email" :value="$user?->email" required />
            <x-forms.input
                label="{{ $user ? 'New Password (leave blank to keep)' : 'Password' }}"
                name="password"
                type="password"
                :required="!$user"
                hint="{{ $user ? 'Min 8 characters' : 'Min 8 characters' }}"
            />
            @if ($user)
                <x-forms.select label="Status" name="status" :options="[
                    'active' => 'Active',
                    'suspended' => 'Suspended',
                    'inactive' => 'Inactive',
                ]" :selected="$user?->status" required />
            @endif
            <div class="md:col-span-2">
                <x-forms.field label="Roles" name="roles">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                        @foreach ($roles as $role)
                            <label class="flex items-center gap-2 rounded-md border border-gray-200 px-3 py-2 text-sm cursor-pointer hover:bg-gray-50">
                                <input
                                    type="checkbox"
                                    name="roles[]"
                                    value="{{ $role->id }}"
                                    class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500"
                                    @checked(in_array($role->id, old('roles', $user?->roles->pluck('id')->all() ?? []), true))
                                />
                                {{ $role->name }}
                            </label>
                        @endforeach
                    </div>
                </x-forms.field>
            </div>
        </div>
    </x-crud-form>
</x-app-layout>