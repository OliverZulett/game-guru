<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Image extends Model
{
  use HasFactory;

  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $keyType = 'string';
  protected $fillable = [
    'id',
    'url',
    'title',
    'description',
    'imageable_type',
    'imageable_id',
  ];
  protected $table = 'images';
  // protected $casts = [
  //   'imageable_id' => 'uuid',
  // ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      $model->id = Uuid::uuid4()->toString();
    });
  }

  public function imageable()
  {
    return $this->morphTo();
  }
}
