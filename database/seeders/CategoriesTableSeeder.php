<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];

        $names = [
            "Reviews",
            "News",
            "Guides",
            "Previews",
            "Tips and Tricks",
            "Walkthroughs",
            "Opinion Pieces",
            "Industry Analysis",
            "Retro Gaming",
            "Game Development",
            "eSports",
            "Interviews",
            "Game Recommendations",
            "Gaming Hardware",
            "Events and Conventions"
        ];
        
        $descriptions = [
            "Posts that analyze and evaluate specific games.",
            "Up-to-date information about releases, announcements, and events in the gaming industry.",
            "Articles that provide tips, tricks, and strategies to help players progress in specific games.",
            "Pre-release previews and impressions of upcoming games.",
            "Posts offering general tips and tricks to improve gaming skills.",
            "Detailed, step-by-step guides to help players complete entire games.",
            "Articles presenting personal opinions on various gaming-related topics.",
            "Posts examining trends, innovations, and significant events in the gaming industry.",
            "Content focused on older games and consoles, as well as related nostalgia.",
            "Articles that explore aspects of the game creation and development process.",
            "Content related to esports, including tournament coverage, notable teams, and players.",
            "Conversations with game developers, designers, or other gaming industry personalities.",
            "Posts suggesting games that readers might enjoy based on their preferences.",
            "Content about consoles, computers, peripherals, and other gaming-related hardware.",
            "Coverage and news about gaming events, expos, and conventions."
        ];

        for ($i = 0; $i < count($names); $i++) {
            $categories[] = [
                'id' => Str::uuid(),
                'name' => $names[$i],
                'description' => $descriptions[$i],
            ];
        }

        $timestamp = now();

        foreach ($categories as &$category) {
            $category['created_at'] = $timestamp;
            $category['updated_at'] = $timestamp;
        }

        DB::table('categories')->insert($categories);
    }
}
