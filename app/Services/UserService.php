<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
  protected $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function getAllUsers()
  {
    return $this->userRepository->getAll();
  }

  public function getAllUsersWithRoleNames()
  {
    return $this->userRepository->getAllWithRoleNames();
  }

  public function getAllUsersWithRoleNamesAndImage()
  {
    return $this->userRepository->getAllWithRoleNamesAndImage();
  }

  public function getUserById($id)
  {
    return $this->userRepository->getById($id);
  }

  public function createUser($user)
  {
    return $this->userRepository->create($user);
  }

  public function updateUser($id, $user)
  {
    return $this->userRepository->update($id, $user);
  }

  public function deleteUser($id)
  {
    $this->userRepository->delete($id);
  }
}
