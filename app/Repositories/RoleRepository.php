<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function getAll()
    {
        return Role::all();
    }

    public function getById($id)
    {
        return Role::findOrFail($id);
    }

    public function create($data)
    {
        return Role::create($data);
    }

    public function update($id, $data)
    {
        $role = $this->getById($id);
        $role->update($data);
        return $role;
    }

    public function delete($id)
    {
        $role = $this->getById($id);
        $role->delete();
    }
}
