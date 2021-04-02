<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMainCategory;
use App\Models\ProductSubCategory;
use App\Models\SiteSetting;
use App\Models\Slide;
use App\Models\SubSlideAdOne;
use App\Models\SubSlideAdTwo;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();
        $maincat1 = ProductMainCategory::where("id","=",1)->get();
        $maincat2 = ProductMainCategory::where("id","=",2)->get();
        $subcat1 = ProductSubCategory::where("main_category_id","=",1)->get();
        $subcat2 = ProductSubCategory::where("main_category_id","=",2)->get();
        // $kitchencategories = ProductSubCategory::where('id', '=', 2);


        $slides = Slide::with(['product_category', 'media'])->get();
        $products = Product::all();

        return view('homepage.home',compact('site','maincat','subcat','slides','products','maincat1','subcat1','maincat2','subcat2'));
    }

    public function productDetails($id) {

        $product = Product::findOrFail($id);
        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();
        $maincat1 = ProductMainCategory::where("id","=",1)->get();
        $maincat2 = ProductMainCategory::where("id","=",2)->get();
        $subcat1 = ProductSubCategory::where("main_category_id","=",1)->get();
        $subcat2 = ProductSubCategory::where("main_category_id","=",2)->get();

        return view('homepage.product-details',compact('product','site','maincat','subcat','maincat1','subcat1','maincat2','subcat2'));
    }

    public function productCtaegory($id) {

        $products = Product::where('category_id',"=", $id)->get();
        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();
        $maincat1 = ProductMainCategory::where("id","=",1)->get();
        $maincat2 = ProductMainCategory::where("id","=",2)->get();
        $subcat1 = ProductSubCategory::where("main_category_id","=",1)->get();
        $subcat2 = ProductSubCategory::where("main_category_id","=",2)->get();

        return view("homepage.product-list",compact('products','site','maincat','subcat','maincat1','subcat1','maincat2','subcat2'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
