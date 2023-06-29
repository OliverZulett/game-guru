<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
  protected $categoryRepository;

  public function __construct(CategoryRepository $categoryRepository)
  {
    $this->categoryRepository = $categoryRepository;
  }

  public function getAllCategories()
  {
    return $this->categoryRepository->getAll();
  }

  public function getCategoryById($id)
  {
    return $this->categoryRepository->getById($id);
  }

  public function createCategory($category)
  {
    return $this->categoryRepository->create($category);
  }

  public function updateCategory($id, $category)
  {
    return $this->categoryRepository->update($id, $category);
  }

  public function deleteCategory($id)
  {
    $this->categoryRepository->delete($id);
  }
}
