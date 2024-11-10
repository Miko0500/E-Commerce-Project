<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Vehicle;

use App\Models\Staff;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use Carbon\Carbon;  

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index() 
{
    // Get count of users who are customers
    $user = User::where('usertype', 'user')->count();

    // Get total products and orders
    $product = Product::count();
    $order = Order::count();

    // Count orders with status 'Delivered'
    $delivered = Order::where('status', 'Finished')->count();

    // Get today's distinct users who have booked, ensuring each user is counted only once
    $todaysBookings = Order::whereDate('created_at', Carbon::today('Asia/Manila'))
                            ->distinct('user_id') // Ensures that only distinct users are counted
                            ->count('user_id'); // Count only distinct users

    // Count all services booked today, even if the same service was booked multiple times
    $todaysServices = Order::whereDate('created_at', Carbon::today('Asia/Manila'))
                            ->count();

    $finishedServicesToday = Order::where('status', 'Finished')
                                    ->whereDate('updated_at', Carbon::today('Asia/Manila')) // Assuming updated_at is when status is changed to Delivered
                                    ->count();

    // Pass all data to the view
    return view('admin.index', compact('user', 'product', 'order', 'delivered', 'todaysBookings', 'todaysServices', 'finishedServicesToday'));
}

    


    public function home()
{
    $product = Product::latest()->paginate(4);

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

    // Get all products (if you need it for other parts of the view)
    $product = Product::all();

    // Initialize count variables
    $count = 0;
    $counts = null; 

    // Check if the user is authenticated
    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;

        // Count items in the user's cart
        $count = Cart::where('user_id', $userid)->count();

        // Count the user's orders
        $counts = Order::where('user_id', $userid)->count();
    }

    // Return the view with the product details and counts
    return view('home.product_details', compact('data', 'count', 'counts', 'product'));
}

public function add_cart($id)
{
    // Get the authenticated user
    $user = Auth::user();
    
    // Check if the user already has a service in the cart
    $existingCart = Cart::where('user_id', $user->id)->first();
    
    if ($existingCart) {
        // If there's already an item in the cart, show an error message
        toastr()->timeOut(10000)->closeButton()->error('You can only add one service to the Pending Page at a time.');
        return redirect()->back();
    }

    // Add the new service to the cart if no existing item is found
    $data = new Cart;
    $data->user_id = $user->id;
    $data->product_id = $id;
    $data->save();

    toastr()->timeOut(10000)->closeButton()->success('Service Added To The Pending Page Successfully');
    return redirect()->back();
}


    public function mycart()
{
    if (Auth::id()) {
        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        $counts = Order::where('user_id', $userid)->count();
        $cart = Cart::where('user_id', $userid)->paginate(3); // Paginate user's cart items

        // Fetch all staff members
        $staff = Staff::all();

        // Fetch vehicle details
        $vehicles = Vehicle::all(); // Fetch all vehicles including type and sizes
    } else {
        $cart = [];
        $count = 0;
        $counts = 0;
        $staff = [];
        $vehicles = []; // No vehicles if not logged in
    }

    return view('home.mycart', compact('count', 'cart', 'counts', 'staff', 'vehicles'));
}

public function fetchServiceDatetimes()
{
    // Fetch orders with status 'In Queue' or 'Ongoing Service' and format the service_datetime field
    $orders = Order::whereIn('status', ['In Queue', 'Ongoing Service'])
        ->select('service_datetime')
        ->get()
        ->map(function ($order) {
            $order->service_datetime = \Carbon\Carbon::parse($order->service_datetime)->format('F j, Y - h:i A');
            return $order;
        });

    // Return the formatted data as JSON for the AJAX request
    return response()->json($orders);
}


    

// In OrderController.php
public function fetchUnavailableDatetimes()
{
    $unavailableDatetimes = Order::where('status', 'Ongoing Service')
        ->pluck('service_datetime')
        ->map(function ($datetime) {
            return \Carbon\Carbon::parse($datetime)->format('Y-m-d\TH:i'); // Format for HTML datetime-local
        });

    return response()->json($unavailableDatetimes);
}




public function confirm_order(Request $request)
{
    // Get the authenticated user's ID
    $userId = Auth::user()->id;

    // Check if the current user already has an active order
    $existingOrder = Order::where('user_id', $userId)
        ->whereIn('status', ['In Queue', 'Ongoing Service'])
        ->first();

    if ($existingOrder) {
        // If an active order exists for this user, show an error message and redirect back
        toastr()->timeOut(10000)->closeButton()->error('You can only have one active order at a time.');
        return redirect()->back();
    }

    // Capture the input data
    $name = $request->name;
    $address = $request->address;
    $phone = $request->phone;
    $staff_id = $request->staff_id;
    $vehicle_id = $request->vehicle_id;
    $size = $request->size;
    $service_datetime = $request->service_datetime;

    // Check if the chosen datetime is already taken by another user
    $conflictingOrder = Order::where('service_datetime', $service_datetime)
        ->where('user_id', '!=', $userId) // Exclude current user's orders
        ->whereIn('status', ['In Queue', 'Ongoing Service'])
        ->first();

    if ($conflictingOrder) {
        // If a conflicting order exists, show an error message and prevent the order
        toastr()->timeOut(10000)->closeButton()->error('The selected date and time is already taken by another user. Please choose a different time.');
        return redirect()->back();
    }

    // Fetch the cart items for the user
    $cartItems = Cart::where('user_id', $userId)->get();

    // Place the order for each item in the cart
    foreach ($cartItems as $cartItem) {
        $order = new Order;
        $order->name = $name;
        $order->rec_address = $address;
        $order->phone = $phone;
        $order->user_id = $userId;
        $order->product_id = $cartItem->product_id;
        $order->staff_id = $staff_id;
        $order->vehicle_id = $vehicle_id;
        $order->size = $size;
        $order->service_datetime = $service_datetime;
        $order->status = 'In Queue'; // Set initial status as 'In Queue'
        $order->save();
    }

    // Clear the cart after placing the order
    Cart::where('user_id', $userId)->delete();

    toastr()->timeOut(10000)->closeButton()->success('Service Booked Successfully');
    return redirect()->back();
}




public function delete_cart($id)
{
    $data = Cart::find($id);
    if ($data) {
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Service Removed From The Pending Page Successfully');
    } else {
        toastr()->timeOut(10000)->closeButton()->error('Service not found in the Pending Page.');
    }
    return redirect()->back();
}


public function myorders()
{
    $user = Auth::user()->id;
    
    $count = Cart::where('user_id', $user)->count();
    $counts = Order::where('user_id', $user)->count();

    // Get orders with staff information
    $order = Order::where('user_id', $user)->with('staff')->paginate(6); // Ensure 'staff' relationship is loaded

    return view('home.order', compact('count', 'order', 'counts'));
}


public function rate(Request $request, $orderId)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
    ]);

    $order = Order::findOrFail($orderId);

    if ($order->status === 'Finished' && !$order->rating) {
        $order->rating()->create([
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);
    }

    toastr()->timeOut(10000)->closeButton()->success('Thank you for your feedback!');

    return redirect()->back();
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

        return view('home.profile',compact('product','count','counts'));
    }

    public function update(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
    ]);

    $user = Auth::user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->address = $request->input('address');

    try {
        $user->save();
    } catch (\Exception $e) {
        Log::error("Error saving user profile: " . $e->getMessage());
        return redirect()->back()->withErrors('There was an error saving your profile. Please try again.');
    }

    return redirect()->back()->with('success', 'Profile updated successfully.');
}


    

    public function staffs()
    {
        $staff = Staff::all();

        $count = '';
        $counts = null; // Set $counts to null by default
        if(Auth::id())
        {

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        $counts = Order::where('user_id',$userid)->count();

        }

        return view('home.staffs',compact('staff','count','counts'));
    }

    public function vehicle()
{
    $vehicles = Vehicle::all(); // Assuming you have a Vehicle model to fetch vehicle data

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

    // Pass the vehicles, cart count, and order count to the vehicles view
    return view('home.vehicle', compact('vehicles', 'count', 'counts'));
}

    
}
