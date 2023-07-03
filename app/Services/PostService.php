<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
  protected $postRepository;

  public function __construct(PostRepository $postRepository)
  {
    $this->postRepository = $postRepository;
  }

  public function getAllPosts()
  {
    return $this->postRepository->getAll();
  }

  public function getAllPostsWithUsername()
  {
    return $this->postRepository->getAllWithUserName();
  }

  public function getPostById($id)
  {
    return $this->postRepository->getById($id);
  }

  public function createPost($post)
  {
    return $this->postRepository->create($post);
  }

  public function updatePost($id, $post)
  {
    return $this->postRepository->update($id, $post);
  }

  public function deletePost($id)
  {
    $this->postRepository->delete($id);
  }
}
