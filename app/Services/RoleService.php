<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles()
    {
        return $this->roleRepository->getAll();
    }

    public function getRoleById($id)
    {
        $role = $this->roleRepository->getById($id);
    
        if (!$role) {
            throw new NotFoundHttpException('Role not found');
        }
    
        return $role;
    }

    public function createRole($role)
    {
        return $this->roleRepository->create($role);
    }

    public function updateRole($id, $role)
    {
        return $this->roleRepository->update($id, $role);
    }

    public function deleteRole($id)
    {
        $this->roleRepository->delete($id);
    }
}
