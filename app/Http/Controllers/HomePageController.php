<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class HomePageController extends Controller
{

    public function productDetails($id) {

        $details = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $site       = Homepage::all();
        return view("product-details", compact("details","categories","site"));
    }

    public function productCategory($id) {

        $categories = ProductCategory::all();
        $site       = Homepage::all();
        $category_name = ProductCategory::findOrFail($id);
        $productscategory = ProductCategory::with("products")->findOrFail($id);

        $products = $productscategory->products;

        // print_r(json_encode($products));

        // print_r(json_encode($productscategory));

        return view("product-list",compact("categories","site","products","category_name"));
    }

    public function authUserLogin() {

    // $rules = array(
    //     'email' => 'required|email',
    //     'password' => 'required|alphaNum|min:8');

    //     $validator = Validator::make(Input::all() , $rules);
    //     // if the validator fails, redirect back to the form
    //     if ($validator->fails()) {

    //       return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
    //       ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    //       } else {
    //       // create our user data for the authentication
    //       $userdata = array(
    //         'email' => Input::get('email') ,
    //         'password' => Input::get('password')
    //       );
    //       // attempt to do the login
    //       if (Auth::attempt($userdata)) {
    //         // validation successful
    //         // do whatever you want on success
    //         } else {
    //         // validation not successful, send back to form
    //         return Redirect::to('checklogin');
    //         }
    //       }

        $categories = ProductCategory::all();
        $site       = Homepage::all();

        return view("auth-login",compact("categories","site"));
    }

    public function authUserRegister() {


        $categories = ProductCategory::all();
        $site       = Homepage::all();

        return view("auth-register",compact("categories","site"));
    }

    public function register(Request $request) {

         User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'address'    => $request->address,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return view("auth-login");
    }

    // add items to cart

    public function addCart($id) {

        $product = Product::find($id);

        $cart = \Cart::add(array(
            'id' => $product->id,
            "name" => $product->name,
            "price" => $product->price_now,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

       return redirect()->back();

    }

    // update cart items

    public function updateCart(Request $request) {

        // $product = \Cart::update($request->id, array(
        //     'quantity' => $request->quantity,
        // ));

        print_r(json_encode($request->itemId));

        // return redirect()->back();
    }

    // add items to cart

    public function cart(Request $request) {

        $categories = ProductCategory::all();
        $site       = Homepage::all();


        return view("cart",compact("categories","site"));
    }

    // checkout
    public function checkout() {

        $categories = ProductCategory::all();
        $site       = Homepage::all();
        return view("checkout", compact("categories","site"));
    }

    // public function registerUser() {

    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        // $catone = ProductCategory::orderBy('id','asc')->limit(4);
        // $cattwo = ProductCategory::orderBy('id','desc')->limit(4);
        $site       = Homepage::all();
        $products   = Product::all();

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
