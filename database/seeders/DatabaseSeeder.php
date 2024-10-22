<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Videogames;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $games = [
            [
                'name' => 'DOOM',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/379720/header.jpg?t=1729407649',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-21 22:33:34',
                'updated_at' => '2024-10-22 00:29:24'
            ],
            [
                'name' => 'Hotline Miami 2: Wrong Number',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/274170/header.jpg?t=1727154885',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-22 00:24:43',
                'updated_at' => '2024-10-22 01:15:21'
            ],
            [
                'name' => 'Like a Dragon Gaiden: The Man Who Erased His Name',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/2375550/header.jpg?t=1729548630',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-22 00:55:30',
                'updated_at' => '2024-10-22 01:05:32'
            ],
            [
                'name' => 'Like a Dragon: Infinite Wealth',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/2072450/header.jpg?t=1728011000',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-22 01:12:35',
                'updated_at' => '2024-10-22 01:15:17'
            ],
            [
                'name' => 'ULTRAKILL',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/1229490/header.jpg?t=1728960182',
                'review' => 'positive',
                'status' => 0,
                'created_at' => '2024-10-22 01:12:51',
                'updated_at' => '2024-10-22 01:15:12'
            ],
            [
                'name' => 'Darkest Dungeon',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/262060/header.jpg?t=1724875775',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-22 01:13:23',
                'updated_at' => '2024-10-22 01:15:09'
            ],
            [
                'name' => 'Fear & Hunger',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/1002300/header.jpg?t=1729450850',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-22 01:13:50',
                'updated_at' => '2024-10-22 01:15:04'
            ],
            [
                'name' => 'Cyberpunk 2077',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/1091500/header.jpg?t=1729494807',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-22 01:14:24',
                'updated_at' => '2024-10-22 02:02:59'
            ],
            [
                'name' => 'Dead Island 2',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/934700/header.jpg?t=1729478360',
                'review' => 'positive',
                'status' => 1,
                'created_at' => '2024-10-22 01:14:48',
                'updated_at' => '2024-10-22 01:14:54'
            ],
            [
                'name' => 'Tenebris Somnia',
                'image' => 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/2121510/header.jpg?t=1729129042',
                'review' => 'none',
                'status' => 0,
                'created_at' => '2024-10-22 01:16:31',
                'updated_at' => '2024-10-22 01:16:31'
            ]
        ];

        foreach ($games as $game) {
            Videogames::create($game);
        }
    }
}
