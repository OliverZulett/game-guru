<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [];

        $names = [
            'Action', 'Adventure', 'Role-playing', 'Shooter', 'Strategy',
            'Sports', 'Racing', 'Simulation', 'Puzzle', 'Fighting',
            'Horror', 'Platformer', 'Open World', 'Stealth', 'Survival',
            'MMORPG', 'Rhythm', 'Indie', 'Sci-Fi', 'Fantasy'
        ];

        $descriptions = [
            'Exciting games that require fast reflexes and quick thinking.',
            'Explore new worlds and embark on thrilling journeys.',
            'Immerse yourself in rich narratives and shape your character\'s destiny.',
            'Engage in intense combat and precision shooting.',
            'Plan your moves and outsmart your opponents.',
            'Compete in various sports disciplines and become a champion.',
            'Speed through tracks and compete against other racers.',
            'Experience realistic simulations and virtual environments.',
            'Challenge your mind with intricate puzzles and brainteasers.',
            'Unleash powerful combos and defeat your foes in epic battles.',
            'Feel the fear and survive in terrifying horror experiences.',
            'Jump and run through challenging platforming levels.',
            'Explore vast open worlds and discover hidden secrets.',
            'Sneak and remain undetected in stealth-focused gameplay.',
            'Test your skills and resourcefulness in harsh survival scenarios.',
            'Enter a persistent online world and interact with other players.',
            'Follow the rhythm and hit the beats in musical gameplay.',
            'Discover unique and innovative games from independent developers.',
            'Unleash your imagination in futuristic sci-fi settings.',
            'Embark on epic quests in magical fantasy realms.'
        ];

        for ($i = 0; $i < count($names); $i++) {
            $tags[] = [
                'id' => Str::uuid(),
                'name' => $names[$i],
                'description' => $descriptions[$i],
            ];
        }

        $timestamp = now();

        foreach ($tags as &$tag) {
            $tag['created_at'] = $timestamp;
            $tag['updated_at'] = $timestamp;
        }

        DB::table('tags')->insert($tags);
    }
}
