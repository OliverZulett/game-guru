<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
  protected $userService;
  protected $roleService;
  protected $imageService;

  public function __construct(UserService $userService, RoleService $roleService, ImageService $imageService)
  {
    $this->userService = $userService;
    $this->roleService = $roleService;
    $this->imageService = $imageService;
  }

  public function index()
  {
    $users = $this->userService->getAllUsersWithRoleNamesAndImage();
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
    ]);
    $userData['role_id'] = $request->input('role_id');

    $userCreated = $this->userService->createUser($userData);

    if ($request->has('url')) {
      $userImage = [
        'url' => $request->input('url'),
        'title' => $userCreated->name,
        'imageable_id' => $userCreated->id,
        'imageable_type' => class_basename(get_class($userCreated)),
      ];

      $this->imageService->createImage($userImage);
    }

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
