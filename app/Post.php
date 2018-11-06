<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        
        if (! is_null($this->image))
        {
            $imagePath = public_path() . "/img/" . $this->image;
            echo $imagePath;
            

            if (file_exists($imagePath)) $imageUrl = asset("img") . "/" . $this->image;
            
        }
        
        return $imageUrl;
    }
}
