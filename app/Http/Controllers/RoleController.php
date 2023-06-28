<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function getRoles()
    {
        $roles = $this->roleService->getAllRoles();
        return response()->json($roles, 200);
    }

    public function getRoleById($id)
    {
        try {
            $role = $this->roleService->getRoleById($id);
            return response()->json($role, 200);
        } catch (NotFoundHttpException $exception) {
            return response()->json(['error' => $exception->getMessage()], 404);
        }
    }

    public function postRole(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $role = $this->roleService->createRole($data);
        return response()->json($role, 201);
    }

    public function patchRole(Request $request, $id)
    {
        $role = $this->roleService->getRoleById($id);

        if ($request->has('name')) {
            $role->name = $request->input('name');
        }

        if ($request->has('description')) {
            $role->description = $request->input('description');
        }

        $updatedRole = $this->roleService->updateRole($id, [
            'name' => $role->name,
            'description' => $role->description,
        ]);

        return response()->json($updatedRole, 200);
    }

    public function putRole(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $role = $this->roleService->updateRole($id, $data);
        return response()->json($role, 200);
    }

    public function deleteRole($id)
    {
        $this->roleService->deleteRole($id);
        return response()->json('Role Deleted', 200);
    }
}
