<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'name' => 'Nasruddin',
            'username' => 'Nasruddin.ST',
            'email' => 'nasruddin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // User::create([
        //     'name' => 'Nas Dev',
        //     'email' => 'nas.dev@gmail.com',
        //     'password' => bcrypt('12345'),
        // ]);


        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque,',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque, illo et consequatur qui alias itaque quod exercitationem voluptatibus perspiciatis earum accusantium possimus architecto nihil optio mollitia? Veritatis.',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque,',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque, illo et consequatur qui alias itaque quod exercitationem voluptatibus perspiciatis earum accusantium possimus architecto nihil optio mollitia? Veritatis.',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque,',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque, illo et consequatur qui alias itaque quod exercitationem voluptatibus perspiciatis earum accusantium possimus architecto nihil optio mollitia? Veritatis.',
        //     'category_id' => 2,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque,',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi omnis nostrum cumque, illo et consequatur qui alias itaque quod exercitationem voluptatibus perspiciatis earum accusantium possimus architecto nihil optio mollitia? Veritatis.',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
    }
}
