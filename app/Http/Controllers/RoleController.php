<?php

namespace App\Http\Controllers;

use App\Services\RoleService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();

        return view('roles', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $this->roleService->createRole($data);

        return Redirect::route('roles')->with('status', 'role-created');
    }

    public function edit($id)
    {
        $role = $this->roleService->getRoleById($id);

        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $this->roleService->updateRole($id, $data);

        return Redirect::route('roles')->with('status', 'role-updated');
    }

    public function destroy($id)
    {
        $this->roleService->deleteRole($id);

        return Redirect::route('roles')->with('status', 'role-deleted');
    }
}
