<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\PostService;
use App\Services\TagService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
  protected $postService;
  protected $categoryService;
  protected $tagService;
  protected $imageService;
  protected $userService;

  public function __construct(PostService $postService, CategoryService $categoryService, TagService $tagService, ImageService $imageService, UserService $userService)
  {
    $this->postService = $postService;
    $this->categoryService = $categoryService;
    $this->tagService = $tagService;
    $this->imageService = $imageService;
    $this->userService = $userService;
  }

  public function index()
  {
    $posts = $this->postService->getAllPostsWithUsername();
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 12;
    $posts = new LengthAwarePaginator(
      $posts->forPage($currentPage, $perPage),
      $posts->count(),
      $perPage,
      $currentPage,
      ['path' => LengthAwarePaginator::resolveCurrentPath()]
    );
    return view('index', compact('posts'));
  }

  public function preview($id)
  {
    $post = $this->postService->getPostById($id);
    $postImage = $this->imageService->getImageByImageableId($post->id);
    $post->image = $postImage->url ?? 'https://images.unsplash.com/photo-1577741314755-048d8525d31e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80';
    $user = $this->userService->getUserById($post->user_id);
    $userImage = $this->imageService->getImageByImageableId($post->id);
    $user->image = $userImage->url ?? 'https://images.unsplash.com/photo-1577741314755-048d8525d31e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80';
    $postCategories = $post->categories;
    $postTags = $post->tags;
    return view('posts.preview', compact('post', 'postCategories', 'postTags', 'user'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required|string',
      'abstract' => 'nullable|string',
      'content' => 'nullable|string',
    ]);
    $this->postService->createPost($data);
    return Redirect::route('posts')->with('status', 'post-created');
  }

  public function edit($id)
  {
    $post = $this->postService->getPostById($id);
    return view('posts.edit', compact('post'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required|string',
      'abstract' => 'nullable|string',
      'content' => 'nullable|string',
    ]);
    $this->postService->updatePost($id, $data);
    return Redirect::route('posts')->with('status', 'post-updated');
  }

  public function destroy($id)
  {
    $this->postService->deletePost($id);
    return Redirect::route('posts')->with('status', 'post-deleted');
  }
}
