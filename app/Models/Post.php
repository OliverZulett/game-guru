<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Post extends Model
{
  use HasFactory;

  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $keyType = 'string';
  protected $table = 'posts';
  protected $fillable = [
    'title',
    'abstract',
    'content',
    'user_id',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      $model->id = Uuid::uuid4()->toString();
    });

    static::deleting(function ($post) {
      $post->categories()->detach();
      $post->tags()->detach();
    });
  }

  public function categories()
  {
    return $this->belongsToMany(Category::class, 'posts_categories', 'post_id', 'category_id');
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id');
  }
}
