<?php

namespace App\Http\Controllers\Frontend;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
{
    $products=product::all();
    $category=Category::all();
    return view('Frontend.index',compact('products','category'));
}
public function category()
    {
        $category=Category::all();
           return view('Frontend.Fcategory',compact('category'));
    }
    public function viewcategory($slug)
    {
        $category=Category::where('slug',$slug)->first();

        $product=product::where('cate_id',$category->id)->get();
           return view('Frontend.products.index',compact('category','product'));
    }
    public function viewproduct($cate_slug,$pro_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(product::where('slug',$pro_slug)->exists())
            {
                $category=Category::where('slug',$cate_slug)->first();

                $product=product::where('slug',$pro_slug)->first();
                   return view('Frontend.products.view',compact('category','product'));
            }
            else
            {
        return redirect('/')->with('status','Link is broken');
            }
        }
        else
        {
            return redirect('/')->with('status','Slug not found');
        }
    }
}
