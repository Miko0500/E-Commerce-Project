<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Vehicle;

use App\Models\Staff;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Rating;

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
        $product = Product::count(); // Load ratings relationship here
    
        
    
        $order = Order::count();
    
        // Count orders with status 'Delivered'
        $delivered = Order::where('status', 'Finished')->count();
    
        // Get today's distinct users who have booked, ensuring each user is counted only once
        $todaysBookings = Order::whereDate('created_at', Carbon::today('Asia/Manila'))
                                ->distinct('user_id')
                                ->count('user_id');
    
        // Count all services booked today, even if the same service was booked multiple times
        $todaysServices = Order::whereDate('created_at', Carbon::today('Asia/Manila'))
                                ->count();
    
        $finishedServicesToday = Order::where('status', 'Finished')
                                        ->whereDate('updated_at', Carbon::today('Asia/Manila'))
                                        ->count();
    
        // Pass all data to the view
        return view('admin.index', compact('user', 'product', 'order', 'delivered', 'todaysBookings', 'todaysServices', 'finishedServicesToday'));
    }
    
    


    public function home()
{
    // Fetch products with ratings
    $product = Product::with('ratings')->latest()->paginate(4);

    $product->map(function ($products) {
        // Calculate the average rating for each product
        $averageRating = $products->ratings->isNotEmpty() ? $products->ratings->avg('rating') : null;
        $products->average_rating = $averageRating ? number_format($averageRating, 1) : null; // Format if available
        return $products;
    });

    $count = '';
    $counts = null;

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
    // Fetch all products with their ratings
    $product = Product::with('ratings')->get();

    $product = $product->map(function ($products) {
        // Calculate the average rating for each product
        $averageRating = $products->ratings->isNotEmpty() ? $products->ratings->avg('rating') : null;
        $products->average_rating = $averageRating ? number_format($averageRating, 1) : null; // Format if available
        return $products;
    });

    $count = '';
    $counts = null; // Set $counts to null by default
    if (Auth::id()) {
        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        $counts = Order::where('user_id', $userid)->count();
    }

    // Pass products with attached average ratings to the view
    return view('home.view_product', compact('product', 'count', 'counts'));
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
        $product = Product::with('ratings')->latest()->paginate(4);

        $product = $product->map(function ($products) {
            // Calculate the average rating for each product
            $averageRating = $products->ratings->isNotEmpty() ? $products->ratings->avg('rating') : null;
            $products->average_rating = $averageRating ? number_format($averageRating, 1) : null; // Format if available
            return $products;
        });

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
        // Fetch the product details
        $data = Product::findOrFail($id);
    
        // Fetch ratings related to this product through orders
        $ratings = Rating::whereHas('order', function ($query) use ($id) {
            $query->where('product_id', $id);
        })->get();
    
        // Get all products for other parts of the view if necessary
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
    
        // Return the view with product details, ratings, and counts
        return view('home.product_details', compact('data', 'count', 'counts', 'product', 'ratings'));
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
    // Fetch orders, prioritize 'Ongoing Service', and format the `service_datetime`
    $orders = Order::whereIn('status', ['In Queue', 'Ongoing Service'])
        ->orderByRaw("FIELD(status, 'Ongoing Service', 'In Queue')") // Ensure 'Ongoing Service' appears first
        ->select('service_datetime', 'status')  // Include status
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


public function myorders(Request $request)
{
    $user = Auth::user()->id;
    $count = Cart::where('user_id', $user)->count();
    $counts = Order::where('user_id', $user)->count();

    // Get sort and filter parameters from the request
    $status = $request->input('status', 'all');
    $sort = $request->input('sort', 'newest');
    $date_filter = $request->input('date_filter', '');

    // Build the query with sorting and filtering
    $query = Order::where('user_id', $user)->with('staff');

    // Apply status filter
    if ($status !== 'all') {
        $query->where('status', $status);
    }

    // Apply date filtering based on selection
    if ($date_filter === 'today') {
        $query->whereDate('created_at', now()->toDateString());
    } elseif ($date_filter === 'week') {
        $query->whereDate('created_at', '>=', now()->subDays(7));
    } elseif ($date_filter === 'month') {
        $query->whereDate('created_at', '>=', now()->subDays(30));
    }

    // Apply sorting
    if ($sort === 'newest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    } elseif ($sort === 'status') {
        $query->orderBy('status', 'asc');
    }

    $order = $query->paginate(6)->appends($request->except('page'));

    return view('home.order', compact('count', 'order', 'counts', 'status', 'sort', 'date_filter'));
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

public function serviceDetails($productId)
{
    // Fetch the service (product) details by ID
    $data = Product::findOrFail($productId);

    // Fetch ratings for the product (linked through orders)
    $ratings = Rating::whereHas('order', function ($query) use ($productId) {
        $query->where('product_id', $productId);
    })->get();

    // Pass the product data and associated ratings to the view
    return view('home.service_details', compact('data', 'ratings'));
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

    public function vehicle(Request $request)
    {
        $count = $counts = 0;
    
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
    
            $count = Cart::where('user_id', $userid)->count();
            $counts = Order::where('user_id', $userid)->count();
        }
    
        // Retrieve the status filter from the request
        $status = $request->input('status');
    
        // Query vehicles based on the status filter
        $vehicles = Vehicle::when($status, function ($query, $status) {
            if (strtolower($status) === 'available') {
                return $query->where('status', true);
            } elseif (strtolower($status) === 'not available') {
                return $query->where('status', false);
            }
        })->get();
    
        return view('home.vehicle', compact('vehicles', 'count', 'counts'));
    }
    

public function search_vehicle(Request $request)
{
    $count = $counts = 0;

    // Check if the user is authenticated
    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        $counts = Order::where('user_id', $userid)->count();
    }

    $search = $request->search;

    // Query vehicles based on type, sizes, or status
    $vehicles = Vehicle::where('type', 'LIKE', '%' . $search . '%')
        ->orWhereJsonContains('sizes', $search)
        ->orWhere(function ($query) use ($search) {
            if (strtolower($search) === 'available') {
                $query->where('status', true);
            } elseif (strtolower($search) === 'not available') {
                $query->where('status', false);
            }
        })
        ->paginate(5);

    return view('home.vehicle', compact('count', 'vehicles', 'counts'));
}

public function search_staff(Request $request)
{
    $count = $counts = 0;

    // Check if the user is authenticated
    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        $counts = Order::where('user_id', $userid)->count();
    }

    $search = $request->search;

    // Query staff based on name, age, sex, or contact
    $staff = Staff::where('name', 'LIKE', '%' . $search . '%')
        ->orWhere('age', 'LIKE', '%' . $search . '%')
        ->orWhere('sex', 'LIKE', '%' . strtolower($search) . '%')
        ->orWhere('contact', 'LIKE', '%' . $search . '%')
        ->paginate(5);

    return view('home.staffs', compact('count', 'staff', 'counts'));
}

    
}
