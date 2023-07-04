<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\RoleService;
use App\Services\TagService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  protected $userService;
  protected $roleService;
  protected $tagService;
  protected $categoryService;
  protected $postService;

  public function __construct(UserService $userService, RoleService $roleService, TagService $tagService, CategoryService $categoryService, PostService $postService)
  {
    $this->userService = $userService;
    $this->roleService = $roleService;
    $this->tagService = $tagService;
    $this->categoryService = $categoryService;
    $this->postService = $postService;
  }

  public function index()
  {
    $users = $this->userService->getAllUsers();
    $roles = $this->roleService->getAllRoles();
    $categories = $this->categoryService->getAllCategories();
    $tags = $this->tagService->getAllTags();
    $posts = $this->postService->getAllPosts();
    $myPosts = $this->postService->getAllPostsByUserId(Auth::user()->id);

    $metrics = [
      'totalUsers' => count($users),
      'totalRoles' => count($roles),
      'totalCategories' => count($categories),
      'totalTags' => count($tags),
      'totalPosts' => count($posts),
      'myTotalPosts' => count($myPosts),
      'totalComments' => 0,
    ];

    return view('dashboard', compact('metrics'));
  }
}
