<?php

namespace App;

use App\Scopes\Locale;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'name_ru', 'meta', 'meta_ru', 'description', 'description_ru', 'title', 'title_ru', 'content', 'content_ru',
        'image_path', 'view', 'slug', 'category_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new Locale());
    }

    public function getContentAttribute($value)
    {
        if (!(\App::getLocale() == 'en')) {
            return $this->getAttribute("content_" . \App::getLocale());
        }
        return $value;
    }

    public function getNameAttribute($value)
    {
        if (!(\App::getLocale() == 'en')) {
            return $this->getAttribute("name_" . \App::getLocale());
        }
        return $value;
    }

    public function getMetaAttribute($value)
    {
        if (!(\App::getLocale() == 'en')) {
            return $this->getAttribute("meta_" . \App::getLocale());
        }
        return $value;
    }

    public function getDescriptionAttribute($value)
    {
        if (!(\App::getLocale() == 'en')) {
            return $this->getAttribute("description_" . \App::getLocale());
        }
        return $value;
    }

    public function getTitleAttribute($value)
    {
        if (!(\App::getLocale() == 'en')) {
            return $this->getAttribute("title_" . \App::getLocale());
        }
        return $value;
    }

}
