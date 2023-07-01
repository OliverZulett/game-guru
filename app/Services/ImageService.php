<?php

namespace App\Services;

use App\Repositories\ImageRepository;

class ImageService
{
  protected $imageRepository;

  public function __construct(ImageRepository $imageRepository)
  {
    $this->imageRepository = $imageRepository;
  }

  public function getAllImages()
  {
    return $this->imageRepository->getAll();
  }

  public function getImageById($id)
  {
    return $this->imageRepository->getById($id);
  }

  public function getImageByImageableId($id)
  {
    return $this->imageRepository->getByImageableId($id);
  }

  public function createImage($image)
  {
    return $this->imageRepository->create($image);
  }

  public function updateImage($id, $image)
  {
    return $this->imageRepository->update($id, $image);
  }

  public function deleteImage($id)
  {
    $this->imageRepository->delete($id);
  }
}
