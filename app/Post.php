<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getImageUrlAttribute($value)
    {
        // $imageUrl = "";
        
        // if (! is_null($this->image))
        // {
        //     $imagePath = public_path() . "/img/" . $this->image;


        //     if (file_exists($imagePath)) $imageUrl = asset("img") . "/" . $this->image;
            
        // }


        $imageUrl = asset("img") . "/" . $this->image;
        // $imageUrl = asset("img") . "/" . "Post_image_5.jpg";
        return $imageUrl;
    }
}
