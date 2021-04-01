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
        // $kitchencategories = ProductSubCategory::where('id', '=', 2);


        $slides = Slide::with(['product_category', 'media'])->get();
        $products = Product::all();

        return view('homepage.home',compact('site','maincat','subcat','slides','products'));
    }

    public function productDetails($id) {

        $product = Product::findOrFail($id);
        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();

        return view('homepage.product-details',compact('product','site','maincat','subcat'));
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
