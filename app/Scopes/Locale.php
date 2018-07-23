<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.02.2018
 * Time: 18:08
 */
class Locale implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $location = App::getLocale();
        $local = $location=='en'?1:2;
        $builder->where('locality',0)->orWhere('locality',$local);
    }

}

