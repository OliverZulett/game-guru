<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
  public function getAll()
  {
    return Post::all();
  }

  public function getAllWithUserName()
  {
    return Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
      ->select('posts.*', 'users.name as user_name')
      ->orderBy('updated_at', 'desc')
      ->get();
  }

  public function getAllWithUserNameAndImage()
  {
    return Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
      ->leftJoin('images', 'users.id', '=', 'imageable_id')
      ->select('posts.*', 'users.name as user_name', 'images.url as user_image')
      ->orderBy('updated_at', 'desc')
      ->get();
  }

  public function getAllByUserId($userId)
  {
    return Post::where('user_id', $userId)
      ->get();
  }

  public function getById($id)
  {
    return Post::findOrFail($id);
  }

  public function create($data)
  {
    return Post::create($data);
  }

  public function update($id, $data)
  {
    $post = $this->getById($id);
    $post->update($data);
    return $post;
  }

  public function delete($id)
  {
    $post = $this->getById($id);
    $post->delete();
  }
}