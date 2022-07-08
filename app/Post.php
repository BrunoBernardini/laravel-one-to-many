<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        "title",
        "slug",
        "content",
        "category_id"
    ];

    public function category()
    {
        return $this->belongsTo("App\Category");
    }

    public static function slugGenerator($title)
    {
        $slug = Str::slug($title, "-");
        $original_slug = $slug;

        $post_checker = Post::where("slug", $slug)->first();
        $counter = 1;
        while($post_checker){
            $slug = "$original_slug-$counter";
            $counter++;
            $post_checker = Post::where("slug", $slug)->first();
        }
        return $slug;
    }
}
