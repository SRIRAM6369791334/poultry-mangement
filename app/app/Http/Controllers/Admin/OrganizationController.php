<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrganizationController extends Controller
{
    public function edit()
    {
        abort_unless(auth()->user()->hasPermissionTo('settings.view') || auth()->user()->isSuperAdmin(), 403);

        return view('organization.edit', [
            'organization' => tenant(),
        ]);
    }

    public function update(Request $request)
    {
        abort_unless(auth()->user()->hasPermissionTo('settings.update') || auth()->user()->isSuperAdmin(), 403);

        $organization = tenant();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'default_currency' => ['required', 'string', 'max:3', Rule::exists('currencies', 'code')],
            'fiscal_year_start' => ['required', 'string', 'max:5'],
        ]);

        $organization->update($data);

        return redirect()->route('organization.edit')->with('success', 'Organization settings updated.');
    }
}