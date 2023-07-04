<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
  protected $postService;

  public function __construct(PostService $postService)
  {
    $this->postService = $postService;
  }

  public function index($id)
  {
    $posts = $this->postService->getAllPostsByUserId($id);
    return view('posts.index', compact('posts'));
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
