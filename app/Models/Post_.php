<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Nasruddin",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero sed eaque perferendis et! Magnam quam consectetur eos velit doloremque beatae dolore fugit accusantium possimus ab laudantium asperiores accusamus ipsam deleniti perferendis facilis minima dolor quos, cupiditate adipisci sit delectus voluptatum? Corrupti, ipsam maiores? Consequuntur amet quae praesentium nisi. Veritatis nam aut qui sapiente dolor eos distinctio alias amet voluptatibus nulla deleniti suscipit praesentium vero quasi harum, asperiores eveniet necessitatibus! Fuga dolor expedita quisquam quos, ad voluptas voluptatibus pariatur accusantium! Cum.",
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Nas Dev",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nesciunt rerum omnis hic perferendis, explicabo, ipsum distinctio accusantium esse aut a? Harum earum atque eum esse, ad blanditiis? Natus dolorum quis assumenda! Doloribus quam non labore tempora, nobis eos possimus? Nostrum fugiat ipsum, eligendi a qui labore doloribus magnam aliquam maiores sequi ex exercitationem architecto porro veritatis, quisquam distinctio. Vel exercitationem odit nam fugiat! A commodi nobis delectus quibusdam eos numquam unde recusandae, obcaecati dicta dignissimos quas omnis maxime quos saepe tenetur exercitationem. Blanditiis tempore rerum sed debitis necessitatibus, ad illum ea, ipsum beatae consequatur id, earum vitae officia quis?",
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
