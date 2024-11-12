<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Models\Category;

use App\Models\Product;

use App\Models\Vehicle;

use App\Models\Staff;

use App\Models\Order;

use Barryvdh\DomPDF\Facade\Pdf;

use Flasher\Toastr\Prime\ToastrInterface;

use Carbon\Carbon;

use App\Models\User;

use App\Models\OrderFinalization;

use App\Models\CountdownTimer;




class AdminController extends Controller
{

    public function getTodaysBookings()
    {
        $today = Carbon::today();
        $todaysBookings = Order::whereDate('created_at', $today)->count();
        return $todaysBookings;
    }
    
    public function getTodaysServices()
    {
        $today = Carbon::today();
        $todaysServices = Order::whereDate('created_at', $today)->distinct('product_id')->count();
        return $todaysServices;
    }

    public function getTodaysFinishedServices()
    {
        $today = Carbon::today();
        $todaysFinishedServices = Order::whereDate('created_at', $today)->distinct('product_id')->count();
        return $todaysFinishedServices;
    }
    

    public function dashboard()
{
    $user = User::count();
    $product = Product::count();
    $order = Order::count();
    $delivered = Order::where('status', 'Finished')->count();

    // Calculate today's bookings and services
    $todaysBookings = $this->getTodaysBookings();
    $todaysServices = $this->getTodaysServices();

    // Pass all variables to the view
    return view('admin.dashboard', compact('user', 'product', 'order', 'delivered', 'todaysBookings', 'todaysServices'));
}




    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);
    
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
    
        return response()->json([
            'success' => 'Category Added Successfully',
            'category' => $category,
        ]);
    }
    


    public function delete_category($id)
    {
        $data = Category::find($id);
    
        if ($data) {
            $data->delete();
            return response()->json(['success' => 'Category Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
    


    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));

    }

    public function update_category(Request $request, $id)
{
    $request->validate([
        'category' => 'required|string|max:255',
    ]);

    $data = Category::find($id);
    $data->category_name = $request->category;
    $data->save();

    return response()->json([
        'success' => 'Category Updated Successfully',
        'category' => $data,
    ]);
}



    public function add_vehicle()
    {
        $vehicles = Vehicle::all();
        return view('admin.add_vehicle', compact('vehicles'));
    }

    // Method to handle the form submission for adding a new vehicle
    public function upload_vehicle(Request $request)
    {
        // Validate the request
        $request->validate([
            'type' => 'required|string|max:255',
            'sizes' => 'required|array', // Accept an array of sizes
            'sizes.*' => 'in:S,M,L,XL,XXL', // Validate each size in the array
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $vehicle = new Vehicle;
        $vehicle->type = $request->type;
        
        // Store sizes directly as an array, no need to use json_encode
        $vehicle->sizes = $request->sizes; 
    
        $vehicle->status = $request->status;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('vehicles'), $imagename);
            $vehicle->image = $imagename;
        }
    
        $vehicle->save();
    
        toastr()->timeOut(10000)->closeButton()->success('Vehicle Added Successfully');
        return redirect()->back();
    }
    


    // Method to view all vehicles
    public function view_vehicle()
    {
        $vehicles = Vehicle::latest()->paginate(6);
        return view('admin.view_vehicle', compact('vehicles'));
    }

    // Method to delete a vehicle
    public function delete_vehicle($id)
    {
        // Find the vehicle
        $vehicle = Vehicle::findOrFail($id);
    
        // Check if the vehicle is being used in an order (or any related table)
        $vehicleInUse = Order::where('vehicle_id', $id)->exists(); // Adjust the table/column names as needed
    
        if ($vehicleInUse) {
            // Notify the user that the vehicle cannot be deleted
            toastr()->error('Vehicle is currently in use and cannot be deleted.');
            return redirect()->back();
        }
    
        // If vehicle has an image, delete it
        if ($vehicle->image) {
            $image_path = public_path('vehicles/' . $vehicle->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    
        // Proceed to delete the vehicle
        $vehicle->delete();
    
        toastr()->success('Vehicle Deleted Successfully');
        return redirect()->back();
    }

    public function checkVehicleUsage($id)
{
    $vehicleInUse = Order::where('vehicle_id', $id)->exists(); // Adjust table/column as needed
    return response()->json(['canDelete' => !$vehicleInUse]);
}




    // Method to display the form for updating a vehicle
    public function update_vehicle($id)
{
    // Check if the vehicle is being used in an order (or any related table)
    $vehicleInUse = Order::where('vehicle_id', $id)->exists();

    if ($vehicleInUse) {
        // Notify the user that the vehicle cannot be edited
        toastr()->error('Vehicle is currently in use and cannot be edited.');
        return redirect()->back();
    }

    // If not in use, proceed with loading the edit form
    $vehicle = Vehicle::findOrFail($id);
    return view('admin.update_vehicle', compact('vehicle'));
}


    // Method to handle the form submission for editing a vehicle
    public function edit_vehicle(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'type' => 'required|string|max:255',
        'sizes' => 'required|array',
        'sizes.*' => 'in:S,M,L,XL,XXL',
        'status' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $vehicle = Vehicle::findOrFail($id);
    $vehicle->type = $request->type;
    $vehicle->sizes = $request->sizes; 
    $vehicle->status = $request->status;
    




    if ($request->hasFile('image')) {
        // Remove old image if it exists
        if ($vehicle->image) {
            $old_image_path = public_path('vehicles/' . $vehicle->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('vehicles'), $imagename);
        $vehicle->image = $imagename;
    }

    $vehicle->save();

    toastr()->timeOut(10000)->closeButton()->success('Vehicle Updated Successfully');
    return redirect('/view_vehicle');
}




    public function add_staff()
    {
        $staff = Staff::all();
        return view('admin.add_staff', compact('staff'));
    }
    
    public function upload_staff(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'birthday' => 'required|date',
            'sex' => 'required|in:male,female,other',
            'contact' => 'required|string|max:20',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = new Staff;
        $data->name = $request->name;
        $data->age = $request->age;
        $data->birthday = $request->birthday;
        $data->sex = $request->sex;
        $data->contact = $request->contact;
        $data->address = $request->address;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('staff'), $imagename);
            $data->image = $imagename;
        }
    
        $data->save();
    
        toastr()->timeOut(10000)->closeButton()->success('Staff Added Successfully');
        return redirect()->back();
    }
    
    public function view_staff()
    {
        $staff = Staff::latest()->paginate(6);
        return view('admin.view_staff', compact('staff'));
    }
    
    public function delete_staff($id)
{
    // Find the staff member
    $staff = Staff::findOrFail($id);

    // Check if the staff is being used in an order (or any related table)
    $staffInUse = Order::where('staff_id', $id)->exists(); // Adjust the table/column names as needed

    if ($staffInUse) {
        // Notify the user that the staff member cannot be deleted
        toastr()->error('Staff member is currently in use and cannot be deleted.');
        return redirect()->back();
    }

    // If staff has an image, delete it
    if ($staff->image) {
        $image_path = public_path('staff/' . $staff->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Proceed to delete the staff member
    $staff->delete();

    toastr()->success('Staff Deleted Successfully');
    return redirect()->back();
}


    public function checkStaffUsage($id)
{
    $staffInUse = Order::where('staff_id', $id)->exists(); // Adjust the `Order` model and column name if necessary
    return response()->json(['canDelete' => !$staffInUse]);
}

    
public function update_staff($id)
{
    // Check if the staff member is being used in an order (or any related table)
    $staffInUse = Order::where('staff_id', $id)->exists(); // Adjust the table/column names as needed

    if ($staffInUse) {
        // Notify the user that the staff member cannot be edited
        toastr()->error('Staff member is currently in use and cannot be edited.');
        return redirect()->back();
    }

    // Find the staff member and load the update view
    $data = Staff::findOrFail($id);
    $staff = Staff::all();
    return view('admin.update_staff', compact('data', 'staff'));
}

    
    public function edit_staff(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'birthday' => 'required|date',
            'sex' => 'required|in:male,female,other',
            'contact' => 'required|string|max:20',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = Staff::findOrFail($id);
        $data->name = $request->name;
        $data->age = $request->age;
        $data->birthday = $request->birthday;
        $data->sex = $request->sex;
        $data->contact = $request->contact;
        $data->address = $request->address;
    
        if ($request->hasFile('image')) {
            // Remove old image if it exists
            if ($data->image) {
                $old_image_path = public_path('staff/' . $data->image);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
    
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('staff'), $imagename);
            $data->image = $imagename;
        }
    
        $data->save();
    
        toastr()->timeOut(10000)->closeButton()->success('Staff Updated Successfully');
        return redirect('/view_staff');
    }
    






    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request)
    {

        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->qty;

        $data->category = $request->category;


        $image = $request->image;

        if($image)
        {

            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;

        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Product Added Successfully');

        return redirect()->back();


    }


    public function view_product()
{
    // Paginate the products and eager load the ratings
    $product = Product::with('ratings')->paginate(10);
    
    // Calculate the average rating for each product
    $product->getCollection()->transform(function ($products) {
        // Calculate the average rating for each product
        $averageRating = $products->ratings->isNotEmpty() ? $products->ratings->avg('rating') : null;
        $products->average_rating = $averageRating ? number_format($averageRating, 1) : null; // Format if available
        return $products;
    });

    return view('admin.view_product', compact('product'));
}


    public function delete_product($id)
    {
        $data = Product::find($id);
        
        // Check if product exists
        if (!$data) {
            toastr()->timeOut(10000)->closeButton()->error('Product not found.');
            return redirect()->back();
        }
        
        // Check if there are ongoing or finished services using this product
        $hasOngoingOrFinishedOrders = Order::where('product_id', $id)
            ->whereIn('status', ['Ongoing Service', 'Finished'])
            ->exists();
            
        if ($hasOngoingOrFinishedOrders) {
            toastr()->timeOut(10000)->closeButton()->error('Cannot delete product: it is currently in use.');
            return redirect()->back();
        }
    
        // Proceed with deletion
        $image_path = public_path('products/'.$data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Product Deleted Successfully');
        
        return redirect()->back();
    }
    
    
    
    

    public function checkProductUsage($id)
    {
        // Check if the product is linked to either ongoing or finished orders
        $hasOngoingOrFinishedOrders = Order::where('product_id', $id)
            ->whereIn('status', ['Ongoing Service', 'Finished'])
            ->exists();
    
        return response()->json(['canDelete' => !$hasOngoingOrFinishedOrders]);
    }
    


    





    public function update_product($id)
{
    // Check if there are ongoing or finished services using this product
    $hasOngoingOrFinishedOrders = Order::where('product_id', $id)
        ->whereIn('status', ['Ongoing Service', 'Finished'])
        ->exists();

    if ($hasOngoingOrFinishedOrders) {
        toastr()->error('Product is currently in use and cannot be edited.');
        return redirect()->back();
    }

    // If not in use, proceed with loading the edit form
    $data = Product::findOrFail($id);
    $category = Category::all();
    return view('admin.update_page', compact('data', 'category'));
}


    public function edit_product(Request $request,$id)
    {
        $data = Product::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {

            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;

        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Product Updated Successfully');


        return redirect('/view_product');


    }

    

    public function product_search(Request $request)
    {

        $search = $request->search;

        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->orWhere('price','LIKE','%'.$search.'%')->paginate(3);

        return view('admin.view_product',compact('product'));
    }

    public function search_vehicles(Request $request)
{
    $search = $request->input('search');

    // Query vehicles based on type, sizes, or status
    $vehicles = Vehicle::where('type', 'LIKE', '%' . $search . '%')
        ->orWhereJsonContains('sizes', $search)
        ->orWhere('status', 'LIKE', '%' . $search . '%')
        ->paginate(5); // You can adjust pagination as needed

    return view('admin.view_vehicle', compact('vehicles'));
}


public function search_staff(Request $request)
{
    $search = $request->input('search');

    // Query staff based on name, age, birthday, sex, contact, or address
    $staff = Staff::where('name', 'LIKE', '%' . $search . '%')
        ->orWhere('age', 'LIKE', '%' . $search . '%')
        ->orWhere('birthday', 'LIKE', '%' . $search . '%')
        ->orWhere('sex', 'LIKE', '%' . $search . '%')
        ->orWhere('contact', 'LIKE', '%' . $search . '%')
        ->orWhere('address', 'LIKE', '%' . $search . '%')
        ->paginate(5); // Adjust pagination as needed

    return view('admin.view_staff', compact('staff'));
}








public function view_orders(Request $request)
{
    // Get the selected status, sort, and date filter from the request
    $selectedStatus = $request->input('status', 'all');
    $selectedSort = $request->input('sort', 'newest');
    $dateFilter = $request->input('date_filter', '');

    // Build the query with filters and include the countdownTimer relationship
    $data = Order::with(['product', 'staff', 'vehicle', 'countdownTimer'])
        ->when($selectedStatus !== 'all', function ($query) use ($selectedStatus) {
            return $query->where('status', $selectedStatus);
        })
        ->when($selectedSort, function ($query) use ($selectedSort) {
            if ($selectedSort == 'newest') {
                return $query->orderBy('created_at', 'desc');
            } elseif ($selectedSort == 'oldest') {
                return $query->orderBy('created_at', 'asc');
            } elseif ($selectedSort == 'status') {
                return $query->orderBy('status');
            }
        })
        ->when($dateFilter, function ($query) use ($dateFilter) {
            if ($dateFilter == 'today') {
                return $query->whereDate('created_at', today());
            } elseif ($dateFilter == 'week') {
                return $query->whereDate('created_at', '>=', now()->subWeek());
            } elseif ($dateFilter == 'month') {
                return $query->whereDate('created_at', '>=', now()->subMonth());
            }
        })
        ->paginate(10) // Adjust pagination as needed
        ->appends($request->except('page')); // Retain filters on pagination

    return view('admin.order', compact('data', 'selectedStatus', 'selectedSort', 'dateFilter'));
}

public function reports(Request $request)
{
    // Get the selected status, sort, and date filter from the request
    $selectedStatus = $request->input('status', 'all');
    $selectedSort = $request->input('sort', 'newest');
    $dateFilter = $request->input('date_filter', '');

    // Build the query with filters and include the countdownTimer relationship
    $data = Order::with(['product', 'staff', 'vehicle', 'countdownTimer'])
        ->when($selectedStatus !== 'all', function ($query) use ($selectedStatus) {
            return $query->where('status', $selectedStatus);
        })
        ->when($selectedSort, function ($query) use ($selectedSort) {
            if ($selectedSort == 'newest') {
                return $query->orderBy('created_at', 'desc');
            } elseif ($selectedSort == 'oldest') {
                return $query->orderBy('created_at', 'asc');
            } elseif ($selectedSort == 'status') {
                return $query->orderBy('status');
            }
        })
        ->when($dateFilter, function ($query) use ($dateFilter) {
            if ($dateFilter == 'today') {
                return $query->whereDate('created_at', today());
            } elseif ($dateFilter == 'week') {
                return $query->whereDate('created_at', '>=', now()->subWeek());
            } elseif ($dateFilter == 'month') {
                return $query->whereDate('created_at', '>=', now()->subMonth());
            }
        })
        ->paginate(10)  // Ensure you're using paginate instead of get
        ->appends($request->except('page')); // Retain filters on pagination

    return view('admin.reports', compact('data', 'selectedStatus', 'selectedSort', 'dateFilter'));
}





public function cancel($id)
{
    // Find the order by its ID
    $order = Order::find($id);

    // Change the status to "Cancelled"
    $order->status = 'Cancelled';

    // Save the updated status
    $order->save();

    // Redirect back with a success message
    toastr()->timeOut(10000)->closeButton()->success('Order has been cancelled successfully.');
    return redirect()->back();
}




    public function ongoing_service($id)
    {

        $data = Order::find($id);

        $data->status = 'Ongoing Service';

        $data->save();

        return redirect('/view_orders');
    }

    public function finished($id)
    {

        $data = Order::find($id);

        $data->status = 'Finished';

        $data->save();

        return redirect('/view_orders');
    }

    public function print_pdf($id)
    {

        
        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',compact('data'));

        return $pdf->download('invoice.pdf');

    }


   


    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);  // Retrieve the order
        $newStatus = $request->input('status');
        
        // Validate and update status based on the input
        if ($newStatus === 'Ongoing Service') {
            $order->status = 'Ongoing Service';
        } elseif ($newStatus === 'Finished') {
            $order->status = 'Finished';
        } else {
            toastr()->error('Invalid status provided.');
            return redirect()->back();
        }
    
        $order->save();  // Save the updated status to the database
    
        // Clear countdown if the status is not "In Queue" or "Finalized"
        if ($newStatus !== 'In Queue' && $newStatus !== 'Finalized') {
            $order->countdownTimer()->update(['countdown_ends_at' => null]);
        }
    
        // Use Toastr for a success message
        toastr()->timeOut(10000)->closeButton()->success('Status changed successfully.');
    
        return redirect()->back();
    }
    
    

    
    
    public function finalizeOrder(Request $request, $id)
{
    // Validate the inputs
    $request->validate([
        'total_price' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Finalize the order by creating or updating the finalization record
    OrderFinalization::updateOrCreate(
        ['order_id' => $id],
        [
            'total_price' => $request->input('total_price'),
            'description' => $request->input('description')
        ]
    );

    // Start countdown timer: Set `countdown_ends_at` to 20 minutes from now
    CountdownTimer::updateOrCreate(
        ['order_id' => $id],
        ['countdown_ends_at' => now()->addMinutes(20)]
    );

    // Use Toastr for a success message
    toastr()->timeOut(10000)->closeButton()->success('Order finalized successfully. Countdown started.');

    return redirect()->back();
}

    
    public function updateOrderFinalization(Request $request, $id)
{
    // Validate the inputs
    $request->validate([
        'total_price' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Find and update the existing order finalization record
    $finalization = OrderFinalization::where('order_id', $id)->first();

    if ($finalization) {
        $finalization->update([
            'total_price' => $request->input('total_price'),
            'description' => $request->input('description'),
        ]);

        // Use Toastr for a success message
        toastr()->timeOut(10000)->closeButton()->success('Order finalization updated successfully.');
    } else {
        toastr()->error('No finalization record found for this order.');
    }

    return redirect()->back();
}


    

    
}
