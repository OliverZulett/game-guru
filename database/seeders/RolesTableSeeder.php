<?php

namespace Database\Seeders;

use App\Models\Role;
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
        DB::table('roles')->insert([
            'id' => Str::uuid(),
            'name' => 'ADMIN',
            'description' => 'all permissions',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id' => Str::uuid(),
            'name' => 'WRITER',
            'description' => 'can write posts',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id' => Str::uuid(),
            'name' => 'READER',
            'description' => 'can read posts',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
