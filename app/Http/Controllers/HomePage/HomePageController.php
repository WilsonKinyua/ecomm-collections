<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductMainCategory;
use App\Models\ProductSubCategory;
use App\Models\SiteSetting;
use App\Models\Slide;
use App\Models\SubSlideAdOne;
use App\Models\SubSlideAdTwo;
use Darryldecode\Cart\Cart;
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

    public function addCart(Request $request) {

        $product = Product::findOrFail($request->product_id);

        $cart = \Cart::add(array(
            'id' => $request->product_id, // inique row ID
            'name' => $product->name,
            'price' => $product->price_after,
            'quantity' => $request->quantity,
            'attributes' => array()
        ));

        return redirect()->back()->with('message', 'Item added to cart successfully');
    }

    public function viewCart() {

        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();
        $maincat1 = ProductMainCategory::where("id","=",1)->get();
        $maincat2 = ProductMainCategory::where("id","=",2)->get();
        $subcat1 = ProductSubCategory::where("main_category_id","=",1)->get();
        $subcat2 = ProductSubCategory::where("main_category_id","=",2)->get();

        return view("homepage.cart",compact('site','maincat','subcat','maincat1','subcat1','maincat2','subcat2'));
    }

    public function removeCart($id) {

        $cart = \Cart::remove($id);

        return redirect()->back()->with('danger', 'Item remove to cart successfully');
    }

    public function confirmation() {

        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();
        $maincat1 = ProductMainCategory::where("id","=",1)->get();
        $maincat2 = ProductMainCategory::where("id","=",2)->get();
        $subcat1 = ProductSubCategory::where("main_category_id","=",1)->get();
        $subcat2 = ProductSubCategory::where("main_category_id","=",2)->get();

        return view("homepage.confirmation", compact('site','maincat','subcat','maincat1','subcat1','maincat2','subcat2'));
    }

    public function placeOrder(Request $request) {

        foreach (\Cart::getContent() as $key ) {

            $product = $key->name;
            $qty = $key->quantity;
            $price = $key->price;

            $order = [
                "customer_name" => $request->customer_name,
                "customer_phone" => $request->customer_phone,
                "address" => $request->address,
                "email" => $request->email,
                "product_price" => $price,
                "quantity" => $qty,
                "product" => $product,
            ];

            Order::create($order);
        }

        \Cart::clear();

        return redirect()->back()->with('success', 'Order created successfully. Your will receive a call shortly from us to confirm order!!');
    }

    public function searchProduct(Request $request) {

        // Get the search value from the request
        $search = $request->input('q');

        // Search in the name and description columns from the products table
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();

        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();
        $maincat1 = ProductMainCategory::where("id","=",1)->get();
        $maincat2 = ProductMainCategory::where("id","=",2)->get();
        $subcat1 = ProductSubCategory::where("main_category_id","=",1)->get();
        $subcat2 = ProductSubCategory::where("main_category_id","=",2)->get();

        return view('homepage.search',compact('products','site','maincat','subcat','maincat1','subcat1','maincat2','subcat2'));
    }

    public function show($id) {

        // $maincat = ProductMainCategory::findOrFail();
        $categories = ProductSubCategory::where('main_category_id',"=", $id)->get();
        // general
        $site = SiteSetting::orderBy('id','desc')->limit(1)->get();
        $maincat = ProductMainCategory::all();
        $subcat = ProductSubCategory::all();
        $maincat1 = ProductMainCategory::where("id","=",1)->get();
        $maincat2 = ProductMainCategory::where("id","=",2)->get();
        $subcat1 = ProductSubCategory::where("main_category_id","=",1)->get();
        $subcat2 = ProductSubCategory::where("main_category_id","=",2)->get();
        // $products = Product::where('category_id','=', $categories)->get();

        // print_r(json_encode($categories));

        return view("homepage.categories",compact("categories",'site','maincat','subcat','maincat1','subcat1','maincat2','subcat2'));
    }

}
