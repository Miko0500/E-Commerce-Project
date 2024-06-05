<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index() 
    {
        $user = User::where('usertype','user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $delivered = Order::where('status','Delivered')->get()->count();

        return view('admin.index',compact('user','product','order','delivered'));
    }


    public function home()
{
    $product = Product::latest()->paginate(8);

    $count = '';
    $counts = null; // Set $counts to null by default
    
    if (Auth::id()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
        $counts = Order::where('user_id', $userid)->count();
    }

    return view('home.index', compact('product', 'count', 'counts'));
}

    public function product()
    {
        
        $product = Product::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();
        }

        
        

        return view('home.view_product',compact('product','count','counts'));
    }

    public function why()
    {
        $product = Product::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();
        }

        

        

        return view('home.why',compact('product','count','counts'));
    }

    public function about_us()
    {
        $product = Product::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();
        }

        
        

        return view('home.about_us',compact('product','count','counts'));
    }



    public function contact_us()
    {
        $product = Product::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();
        }

        

        

        return view('home.contact_us',compact('product','count','counts'));
    }


    public function login_home()
    {
        $product = Product::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();
        }


        return view('home.index',compact('product','count','counts'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();
        }

        

        return view('home.product_details',compact('data','count','counts'));

    }

    public function add_cart($id)
    {

        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Product Added To The Cart Successfully');

        return redirect()->back();



    }

    public function mycart()
    {

        

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $counts = Order::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        
        $cart = Cart::paginate(3);
        return view('home.mycart',compact('count','cart','counts'));

    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->success('Product Removed From The Cart Successfully');

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {

        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();


        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->save();

           

        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $datas = Cart::find($remove->id);

            $datas->delete();    
        }

        toastr()->timeOut(10000)->closeButton()->success('Product Ordered Successfully');

        return redirect()->back();

    }

    public function myorders()
    {
        
            $user = Auth::user()->id;

           

            $count = Cart::where('user_id',$user)->get()->count();

            $counts = Order::where('user_id',$user)->count();

            $order = Order::where('user_id',$user)->get();

            
            $order = Order::where('user_id',$user)->paginate(5);
        return view('home.order',compact('count','order','counts'));

    }

    public function search_product(Request $request)
    {

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $counts = Order::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }

        $search = $request->search;

        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->orWhere('price','LIKE','%'.$search.'%')->paginate(3);

        return view('home.view_product',compact('count','product','counts'));
    }

    public function privacy()
    {
        $product = Product::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();

        }

       

        

        return view('home.privacy',compact('product','count','counts'));
    }

    public function profile_app()
    {
        $product = Product::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();

        }

        return view('layouts.navigation',compact('product','count','counts'));
    }
    
}
