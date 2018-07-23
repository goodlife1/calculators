<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_en', 'name_ru', 'slug',
        'image_path', 'main_category',
        'main_category_id', 'description_en', 'description_ru'
    ];

    public function calculator()
    {
        return $this->hasMany('App\Page', 'category_id', 'id');
    }

    public function subCategory()
    {
        return self::where('main_category_id', $this->id)->get();
    }

    public function getNameAttribute()
    {
        return $this->getAttribute("name_" . \App::getLocale());
    }

    public function page()
    {
        $categorie = self::select('id')->where('main_category_id', $this->id)->get()->map(function ($cat) {
            return $cat->id;
        })->toArray();
        return Page::whereIn('category_id', $categorie)->limit(5)->get();


    }
}
