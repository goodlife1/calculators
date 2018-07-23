<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function search(Request $request)
    {
        $lang = '';
        if (\App::getLocale() == 'ru') {
            $lang = '_ru';
        }
        $pages = Page::where('description' . $lang, 'LIKE', '%' . $request->q . '%')->orWhere('name' . $lang, 'LIKE', '%' . $request->q . '%')->get();
        return view('search', compact('pages'));

    }

    public function index()
    {
        $page = Page::where('slug', '/')->first();
        $categories = Category::where('main_category', 1)->get();
        return view('home', compact('categories','page'));
    }

    public function getCategoryCalculators($category)
    {
        $category = Category::where('slug', $category)->first();
        $sub_category = Category:: where('main_category_id', $category->id)->get();
        return view('category', ['category' => $sub_category,'main_cat'=>$category]);
    }

    public function getPage(Request $request,$page)
    {
        try {
            $page = Page::where('slug', $page)->firstOrFail();
        } catch (\Error $er) {
            return redirect('/404');
        }
        return view($page->view, ['page' => $page]);
    }

    public function contactUs()
    {
        return view('contact_us');
    }
}
