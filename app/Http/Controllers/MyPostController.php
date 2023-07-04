<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MyPostController extends Controller
{
  protected $postService;
  protected $categoryService;
  protected $tagService;
  protected $imageService;

  public function __construct(PostService $postService, CategoryService $categoryService, TagService $tagService, ImageService $imageService)
  {
    $this->postService = $postService;
    $this->categoryService = $categoryService;
    $this->tagService = $tagService;
    $this->imageService = $imageService;
  }

  public function index()
  {
    $posts = $this->postService->getAllPostsByUserId(Auth::user()->id);
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 5;
    $posts = new LengthAwarePaginator(
      $posts->forPage($currentPage, $perPage),
      $posts->count(),
      $perPage,
      $currentPage,
      ['path' => LengthAwarePaginator::resolveCurrentPath()]
    );
    return view('myPosts.index', compact('posts'));
  }

  public function create()
  {
    $categories = $this->categoryService->getAllCategories();
    $tags = $this->tagService->getAllTags();
    return view('myPosts.create', compact('categories', 'tags'));
  }

  public function store(Request $request)
  {
    $postData = $request->validate([
      'title' => 'required|string',
      'abstract' => 'required|string',
      'content' => 'required|string',
    ]);
    $postData['user_id'] = Auth::user()->id;
    $post = $this->postService->createPost($postData);

    $postImage = [
      'url' => $request->input('image_url'),
      'title' => $post->name,
      'imageable_id' => $post->id,
      'imageable_type' => class_basename(get_class($post)),
    ];
    $this->imageService->createImage($postImage);

    $post->categories()->sync($request->categories);
    $post->tags()->sync($request->tags);
    return Redirect::route('my-posts')->with('status', 'post-created');
  }

  public function edit($id)
  {
    $categories = $this->categoryService->getAllCategories();
    $tags = $this->tagService->getAllTags();
    $post = $this->postService->getPostById($id);
    $image = $this->imageService->getImageByImageableId($id);
    $postCategories = $post->categories;
    $postTags = $post->tags;
    return view('myPosts.edit', compact('post', 'categories', 'tags', 'image', 'postCategories', 'postTags'));
  }

  public function update(Request $request, $id)
  {
    $postData = $request->validate([
      'title' => 'required|string',
      'abstract' => 'required|string',
      'content' => 'required|string',
    ]);
    $post = $this->postService->updatePost($id, $postData);

    $postImage = $this->imageService->getImageByImageableId($post->id);

    if (!$postImage && $request->has('image_url') && !empty($request->input('image_url'))) {
      $postImage = [
        'url' => $request->input('image_url'),
        'title' => $post->name,
        'imageable_id' => $post->id,
        'imageable_type' => class_basename(get_class($post)),
      ];
      $this->imageService->createImage($postImage);
    } elseif ($postImage && $request->has('image_url')) {
      $postImage->url = $request->input('image_url');
      $this->imageService->updateImage($postImage->id, $postImage);
    }

    $post->categories()->sync($request->categories);
    $post->tags()->sync($request->tags);
    return Redirect::route('my-posts')->with('status', 'post-updated');
  }

  public function destroy($id)
  {
    $this->postService->deletePost($id);
    $postImage = $this->imageService->getImageByImageableId($id);

    if ($postImage) {
      $this->imageService->deleteImage($postImage->id);
    }

    return Redirect::route('my-posts')->with('status', 'post-deleted');
  }
}
