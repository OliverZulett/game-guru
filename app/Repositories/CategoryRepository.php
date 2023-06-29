<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
  public function getAll()
  {
    return Category::all();
  }

  public function getById($id)
  {
    return Category::findOrFail($id);
  }

  public function create($data)
  {
    return Category::create($data);
  }

  public function update($id, $data)
  {
    $category = $this->getById($id);
    $category->update($data);
    return $category;
  }

  public function delete($id)
  {
    $category = $this->getById($id);
    $category->delete();
  }
}
