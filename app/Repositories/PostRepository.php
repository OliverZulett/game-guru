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