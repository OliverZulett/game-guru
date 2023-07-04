<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $roles = [
      [
        'id' => Str::uuid(),
        'name' => 'ADMIN',
        'description' => 'all permissions',
      ],
      [
        'id' => Str::uuid(),
        'name' => 'WRITER',
        'description' => 'can write posts',
      ],
      [
        'id' => Str::uuid(),
        'name' => 'READER',
        'description' => 'can read posts',
      ],
    ];

    $timestamp = now();

    foreach ($roles as &$role) {
      $role['created_at'] = $timestamp;
      $role['updated_at'] = $timestamp;
    }

    DB::table('roles')->insert($roles);
  }
}
