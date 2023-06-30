<?php

namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{
  protected $tagRepository;

  public function __construct(TagRepository $tagRepository)
  {
    $this->tagRepository = $tagRepository;
  }

  public function getAllTags()
  {
    return $this->tagRepository->getAll();
  }

  public function getTagById($id)
  {
    return $this->tagRepository->getById($id);
  }

  public function createTag($tag)
  {
    return $this->tagRepository->create($tag);
  }

  public function updateTag($id, $tag)
  {
    return $this->tagRepository->update($id, $tag);
  }

  public function deleteTag($id)
  {
    $this->tagRepository->delete($id);
  }
}
