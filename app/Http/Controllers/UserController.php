<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
  protected $userService;
  protected $roleService;

  public function __construct(UserService $userService, RoleService $roleService)
  {
    $this->userService = $userService;
    $this->roleService = $roleService;
  }

  public function index()
  {
    $users = $this->userService->getAllUsersWithRoleNames();
    return view('users.index', compact('users'));
  }

  public function create()
  {
    $roles = $this->roleService->getAllRoles();
    return view('users.create', compact('roles'));
  }

  public function store(Request $request)
  {
    $userData = $request->validate([
      'name' => 'required|string',
      'email' => 'required|string',
      'password' => 'required|string',
      'role_id' => 'required|string',
    ]);
    $userData['role_id'] = $request->input('role_id');
    $this->userService->createUser($userData);
    return Redirect::route('users')->with('status', 'user-created');
  }

  public function edit($id)
  {
    $user = $this->userService->getUserById($id);
    $roles = $this->roleService->getAllRoles();
    return view('users.edit', compact('user', 'roles'));
  }

  public function update(Request $request, $id)
  {
    $userData = $request->validate([
      'name' => 'required|string',
      'email' => 'required|string',
      'password' => 'required|string',
      'role_id' => 'required|string',
    ]);
    $userData['role_id'] = $request->input('role_id');
    $this->userService->updateUser($id, $userData);
    return Redirect::route('users')->with('status', 'user-updated');
  }

  public function destroy($id)
  {
    $this->userService->deleteUser($id);
    return Redirect::route('users')->with('status', 'user-deleted');
  }
}
