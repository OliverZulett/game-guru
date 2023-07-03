<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\RoleService;
use App\Services\TagService;
use App\Services\UserService;

class DashboardController extends Controller
{
  protected $userService;
  protected $roleService;
  protected $tagService;
  protected $categoryService;

  public function __construct(UserService $userService, RoleService $roleService, TagService $tagService, CategoryService $categoryService)
  {
    $this->userService = $userService;
    $this->roleService = $roleService;
    $this->tagService = $tagService;
    $this->categoryService = $categoryService;
  }

  public function index()
  {
    $users = $this->userService->getAllUsers();
    $roles = $this->roleService->getAllRoles();
    $categories = $this->categoryService->getAllCategories();
    $tags = $this->tagService->getAllTags();

    $metrics = [
      'totalUsers' => count($users),
      'totalRoles' => count($roles),
      'totalCategories' => count($categories),
      'totalTags' => count($tags),
      'totalPosts' => 0,
      'totalComments' => 0,
    ];

    return view('dashboard', compact('metrics'));
  }
}
