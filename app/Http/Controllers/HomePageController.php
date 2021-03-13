<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function productDetails($id) {

        $details = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $site       = Homepage::all();
        return view("product-details", compact("details","categories","site"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        $site       = Homepage::all();
        $products   = Product::orderBy('id',"asc")->paginate(16);

        // $productslatest   = Product::orderBy('id',"desc")->paginate(12);
        $productslatest = Product::with(['categories', 'media'])->orderBy('id',"desc")->paginate(12);

        $featured = Product::inRandomOrder()->limit(3)->get();
        return view("welcome",compact("categories","site","products","productslatest","featured"));
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
