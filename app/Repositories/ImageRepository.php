<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository
{
  public function getAll()
  {
    return Image::all();
  }

  public function getById($id)
  {
    return Image::findOrFail($id);
  }

  public function getByImageableId($id)
  {
    return Image::where('imageable_id', 'like', $id . '%')->first();
  }

  public function create($data)
  {
    return Image::create($data);
  }

  public function update($id, $data)
  {
    $image = $this->getById($id);
    $image->update($data->toArray());
    return $image;
  }

  public function delete($id)
  {
    $image = $this->getById($id);
    $image->delete();
  }
}
