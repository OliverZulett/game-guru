<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new RolesTableSeeder)->run();
        (new CategoriesTableSeeder)->run();
        (new TagsTableSeeder)->run();
        (new UsersTableSeeder)->run();
        (new PostsTableSeeder)->run();
    }
}
