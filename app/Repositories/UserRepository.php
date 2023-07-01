<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
  public function getAll()
  {
    return User::all();
  }

  public function getAllWithRoleNames()
  {
    return User::leftJoin('roles', 'users.role_id', '=', 'roles.id')
      ->select('users.*', 'roles.name as role_name')
      ->get();
  }

  public function getAllWithRoleNamesAndImage()
  {
    return User::leftJoin('roles', 'users.role_id', '=', 'roles.id')
      ->leftJoin('images', 'users.id', '=', 'imageable_id')
      ->select('users.*', 'roles.name as role_name', 'images.url')
      ->get();
  }

  public function getById($id)
  {
    return User::findOrFail($id);
  }

  public function create($data)
  {
    return User::create($data);
  }

  public function update($id, $data)
  {
    $user = $this->getById($id);
    $user->update($data);
    return $user;
  }

  public function delete($id)
  {
    $user = $this->getById($id);
    $user->delete();
  }
}
