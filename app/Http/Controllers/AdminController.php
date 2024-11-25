<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Models\Category;

use App\Models\Product;

use App\Models\Vehicle;

use App\Models\Staff;

use App\Models\Order;

use App\Models\SlotAvailability;

use Barryvdh\DomPDF\Facade\Pdf;

use Flasher\Toastr\Prime\ToastrInterface;

use Carbon\Carbon;

use App\Models\User;

use App\Models\OrderFinalization;

use App\Models\CountdownTimer;

use Illuminate\Support\Facades\Auth;


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
    // Validate the input
    $request->validate([
        'category' => 'required|string|max:255',
    ]);

    // Normalize the input category to lowercase
    $categoryName = strtolower($request->category);

    // Check if a category with the same name (case-insensitive) already exists
    $existingCategory = Category::whereRaw('LOWER(category_name) = ?', [$categoryName])->first();

    if ($existingCategory) {
        // If category exists, return specific error message
        return response()->json([
            'error' => 'Category with the same name already exists.',
        ], 400); // 400 indicates a client-side error
    }

    // If no existing category, proceed to add the new category
    try {
        $category = new Category;
        $category->category_name = $request->category; // Store the original input
        $category->save();

        return response()->json([
            'success' => 'Category Added Successfully',
            'category' => $category,
        ]);
    } catch (\Exception $e) {
        // Return a generic error message if something goes wrong
        return response()->json([
            'error' => 'Error adding category: ' . $e->getMessage(),
        ], 500); // 500 indicates server error
    }
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
        // Validate the input
        $request->validate([
            'category' => 'required|string|max:255',
        ]);
    
        // Normalize the input category to lowercase for case-insensitive comparison
        $categoryName = strtolower($request->category);
    
        // Check if a category with the same name (case-insensitive) already exists, excluding the current category being updated
        $existingCategory = Category::whereRaw('LOWER(category_name) = ?', [$categoryName])
            ->where('id', '!=', $id) // Exclude the current category being updated
            ->first();
    
        if ($existingCategory) {
            // If category exists, return a specific error message
            return response()->json([
                'error' => 'Category with the same name already exists.',
            ], 400); // 400 indicates a client-side error
        }
    
        // Find the category by ID
        $data = Category::find($id);
    
        // Check if category exists in the database
        if (!$data) {
            return response()->json([
                'error' => 'Category not found.',
            ], 404); // 404 indicates not found error
        }
    
        // Update the category name
        $data->category_name = $request->category; // Use the original category name (case-sensitive)
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

    public function upload_vehicle(Request $request)
    {
        // Validate the request
        $request->validate([
            'type' => 'required|string|max:255',
            'sizes' => 'required|array', // Accept an array of sizes
            'sizes.*' => 'in:S,M,L,XL,XXL', // Validate each size in the array
            'description' => 'nullable|string|max:255', // New description field
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Normalize the vehicle type to lowercase for case-insensitive comparison
        $vehicleType = strtolower($request->type);
    
        // Check if a vehicle with the same type already exists (case-insensitive)
        $existingVehicle = Vehicle::whereRaw('LOWER(type) = ?', [$vehicleType])->first();
    
        if ($existingVehicle) {
            // If a vehicle with the same type exists, return an error message
            toastr()->timeOut(10000)->closeButton()->error('A vehicle with this type already exists.');
            return redirect()->back();
        }
    
        // Proceed to create the new vehicle
        $vehicle = new Vehicle;
        $vehicle->type = $request->type;
    
        // Store sizes directly as an array
        $vehicle->sizes = $request->sizes;
    
        $vehicle->description = $request->description; // Save description
    
        // Handle image upload if there is one
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


public function edit_vehicle(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'type' => 'required|string|max:255',
        'sizes' => 'required|array',
        'sizes.*' => 'in:S,M,L,XL,XXL',
        'description' => 'nullable|string|max:255', // New description field
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Find the vehicle by ID
    $vehicle = Vehicle::findOrFail($id);

    // Normalize the vehicle type to lowercase for case-insensitive comparison
    $vehicleType = strtolower($request->type);

    // Check if another vehicle with the same type already exists (case-insensitive), excluding the current vehicle
    $existingVehicle = Vehicle::whereRaw('LOWER(type) = ?', [$vehicleType])
        ->where('id', '!=', $id) // Exclude the current vehicle from the check
        ->first();

    if ($existingVehicle) {
        // If a vehicle with the same type exists, return an error message
        toastr()->timeOut(10000)->closeButton()->error('A vehicle with this type already exists.');
        return redirect()->back();
    }

    // Update the vehicle details
    $vehicle->type = $request->type;
    $vehicle->sizes = $request->sizes;
    $vehicle->description = $request->description; // Update description field

    // Handle image upload if there is a new image
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

    // Save the updated vehicle details
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
        'years_of_expertise' => 'required|integer',  // New validation rule for years of expertise
        'field_of_expertise' => 'required|string|max:255',  // New validation rule for field of expertise
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Normalize the staff name to lowercase for case-insensitive comparison
    $staffName = strtolower($request->name);

    // Check if a staff member with the same name already exists (case-insensitive)
    $existingStaff = Staff::whereRaw('LOWER(name) = ?', [$staffName])->first();

    if ($existingStaff) {
        // If a staff member with the same name exists, show an error message
        toastr()->timeOut(10000)->closeButton()->error('A staff member with this name already exists.');
        return redirect()->back();
    }

    // Create a new staff member
    $data = new Staff;
    $data->name = $request->name;
    $data->years_of_expertise = $request->years_of_expertise;  // Store years of expertise
    $data->field_of_expertise = $request->field_of_expertise;  // Store field of expertise

    // Handle image upload if present
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('staff'), $imagename);
        $data->image = $imagename;
    }

    // Save the new staff member
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
        'years_of_expertise' => 'required|integer',  // New validation rule for years of expertise
        'field_of_expertise' => 'required|string|max:255',  // New validation rule for field of expertise
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Normalize the staff name to lowercase for case-insensitive comparison
    $staffName = strtolower($request->name);

    // Check if another staff member with the same name exists, excluding the current staff being edited
    $existingStaff = Staff::whereRaw('LOWER(name) = ?', [$staffName])
        ->where('id', '!=', $id)  // Exclude the current staff being edited
        ->first();

    if ($existingStaff) {
        // If a staff member with the same name exists, show an error message
        toastr()->timeOut(10000)->closeButton()->error('A staff member with this name already exists.');
        return redirect()->back();
    }

    // Find the staff member to be updated
    $data = Staff::findOrFail($id);
    $data->name = $request->name;
    $data->years_of_expertise = $request->years_of_expertise;  // Update years of expertise
    $data->field_of_expertise = $request->field_of_expertise;  // Update field of expertise

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Remove old image if it exists
        if ($data->image) {
            $old_image_path = public_path('staff/' . $data->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        // Save the new image
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('staff'), $imagename);
        $data->image = $imagename;
    }

    // Save the updated staff data
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

        toastr()->timeOut(10000)->closeButton()->success('Service Added Successfully');

        return redirect()->back();


    }


    public function view_product()
    {
        // Paginate the products and eager load the ratings, order by created_at descending to show new products first
        $product = Product::with('ratings')
            ->latest()  // Order products by the 'created_at' column in descending order (newest first)
            ->paginate(10);
        
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
            toastr()->timeOut(10000)->closeButton()->error('Service not found.');
            return redirect()->back();
        }
        
        // Check if there are ongoing or finished services using this product
        $hasOngoingOrFinishedOrders = Order::where('product_id', $id)
            ->whereIn('status', ['Ongoing Service', 'Finished'])
            ->exists();
            
        if ($hasOngoingOrFinishedOrders) {
            toastr()->timeOut(10000)->closeButton()->error('Cannot delete service: it is currently in use.');
            return redirect()->back();
        }
    
        // Proceed with deletion
        $image_path = public_path('products/'.$data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Service Deleted Successfully');
        
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
        toastr()->error('Service is currently in use and cannot be edited.');
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

        toastr()->timeOut(10000)->closeButton()->success('Service Updated Successfully');


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
    $selectedSort = $request->input('sort');
    $dateFilter = $request->input('date_filter', '');

    // Build the query with filters and include the countdownTimer relationship
    $data = Order::with(['product', 'countdownTimer']) // Removed staff and vehicle relationships
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
        // Prioritize 'In Queue' and 'Ongoing Service' first
        ->orderByRaw("CASE WHEN status = 'In Queue' THEN 1 WHEN status = 'Ongoing Service' THEN 2 ELSE 3 END")
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
    $selectedSort = $request->input('sort', 'newest'); // Default to 'newest' if no sort is selected
    $dateFilter = $request->input('date_filter', '');
    $groupDateFilter = $request->input('group_date_filter', ''); // New group date filter
    $staffFilter = $request->input('staff_filter', ''); // Get staff filter
    $vehicleFilter = $request->input('vehicle_filter', ''); // Get vehicle filter
    $statusFilter = $request->input('status_filter', ''); // Added filter for status (Finished / Cancelled)

    // Split the date_filter input by commas and trim any extra spaces
    $dates = $dateFilter ? explode(',', $dateFilter) : [];

    // Clean up the dates and remove any invalid date formats
    $dates = array_map('trim', $dates);
    $dates = array_filter($dates, function ($date) {
        return \Carbon\Carbon::hasFormat($date, 'Y-m-d');
    });

    // Initialize the query
    $query = Order::with(['product', 'finalization', 'countdownTimer']) // Include finalization to get staff and vehicle
        // Select orders with 'Finished' or 'Cancelled' status by default
        ->whereIn('status', ['Finished', 'Cancelled']) // Updated to include 'Cancelled'
        ->when($statusFilter, function ($query) use ($statusFilter) {
            return $query->where('status', $statusFilter); // Filter by selected status
        })
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
        // Filter by Staff Name if provided
        ->when($staffFilter, function ($query) use ($staffFilter) {
            return $query->whereHas('finalization', function ($query) use ($staffFilter) {
                return $query->where('staff', 'like', '%' . $staffFilter . '%'); // Search staff name
            });
        })
        ->when($vehicleFilter, function ($query) use ($vehicleFilter) {
            return $query->whereHas('finalization', function ($query) use ($vehicleFilter) {
                return $query->where('vehicle', $vehicleFilter); // Filter by vehicle from finalization table
            });
        })
        ->when(!empty($dates), function ($query) use ($dates) {
            return $query->whereIn(\DB::raw('DATE(service_datetime)'), $dates); // Apply individual dates filter
        });

    // Group date filter logic
    if ($groupDateFilter === 'today') {
        $query->whereDate('created_at', \Carbon\Carbon::today());
    } elseif ($groupDateFilter === 'week') {
        $query->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()]);
    } elseif ($groupDateFilter === 'month') {
        $query->whereMonth('created_at', \Carbon\Carbon::now()->month);
    }

    // Execute the query and paginate results
    $data = $query->paginate(10)  // Paginate results
        ->appends($request->except('page')); // Retain filters on pagination

    // Calculate the total price of the orders
    $totalPrice = $data->sum(function ($order) {
        return $order->finalization ? $order->finalization->total_price : 0;
    });

    // Get the list of all staff members for the dropdown (if needed)
    $staffList = Staff::all();

    // Get the list of all vehicles for the dropdown (if needed)
    $vehicleList = Vehicle::all();

    return view('admin.reports', compact('data', 'selectedStatus', 'selectedSort', 'dateFilter', 'staffList', 'vehicleList', 'totalPrice'));
}




public function slot()
    {
        // Return the view where the admin can manage the slots
        return view('admin.slot');
    }


 // Method to fetch booked times for a selected date
 public function fetchBookedTimes(Request $request)
 {
     // Validate the input date
     $request->validate([
         'date' => 'required|date'
     ]);

     // Get the booked times for the selected date
     $date = $request->input('date');

     // Fetch all orders (or bookings) on the selected date
     $bookedTimes = Order::whereDate('service_datetime', $date)
                         ->pluck('service_datetime')
                         ->map(function($datetime) {
                             return \Carbon\Carbon::parse($datetime)->format('H:i');
                         })
                         ->toArray();

     return response()->json(['bookedTimes' => $bookedTimes]);
 }

//  public function disableTimeSlot(Request $request)
// {
    
//     $request->validate([
//         'date' => 'required|date',
//         'time' => 'required|string'
//     ]);

//     $date = $request->input('date');
//     $time = $request->input('time');
//     $serviceDateTime = $date . ' ' . $time;

    
//     $order = Order::where('service_datetime', $serviceDateTime)->first();

//     if (!$order) {
        
//         $order = new Order();
//         $order->service_datetime = $serviceDateTime;
//         $order->status = 'Booked';
//         $order->save();

//         return response()->json(['success' => true, 'message' => 'Time slot disabled successfully.']);
//     }

//     return response()->json(['success' => false, 'message' => 'Time slot is already booked.']);
// }

// public function enableTimeSlot(Request $request)
// {
    
//     $request->validate([
//         'date' => 'required|date',
//         'time' => 'required|string'
//     ]);

//     $date = $request->input('date');
//     $time = $request->input('time');
//     $serviceDateTime = $date . ' ' . $time;

    
//     $order = Order::where('service_datetime', $serviceDateTime)->first();

//     if ($order) {
        
//         $order->status = 'Available';
//         $order->save();

//         return response()->json(['success' => true, 'message' => 'Time slot is now available.']);
//     }

//     return response()->json(['success' => false, 'message' => 'Time slot not found.']);
// }








public function cancel($id)
{
    // Find the order by its ID
    $order = Order::find($id);

    // Change the status to "Cancelled"
    $order->status = 'Cancelled';

    // Save the updated status
    $order->save();

    // Redirect back with a success message
    toastr()->timeOut(10000)->closeButton()->success('Booking has been cancelled successfully.');
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
        'total_price' => 'required|numeric',
        'description' => 'nullable|string',
        'staff' => 'nullable|string',
        'vehicle' => 'nullable|string',
        'size' => 'nullable|string',
    ]);

    // Finalize the order by creating or updating the finalization record
    OrderFinalization::updateOrCreate(
        ['order_id' => $id],
        [
            'total_price' => $request->input('total_price'),
            'description' => $request->input('description'),
            'staff' => $request->input('staff'),  // Added staff
            'vehicle' => $request->input('vehicle'), // Added vehicle
            'size' => $request->input('size'), // Added size
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
        'total_price' => 'required|numeric',
        'description' => 'nullable|string',
        'staff' => 'nullable|string',
        'vehicle' => 'nullable|string',
        'size' => 'nullable|string',
    ]);

    // Find and update the existing order finalization record
    $finalization = OrderFinalization::where('order_id', $id)->first();

    if ($finalization) {
        $finalization->update([
            'total_price' => $request->input('total_price'),
            'description' => $request->input('description'),
            'staff' => $request->input('staff'),  // Updated staff
            'vehicle' => $request->input('vehicle'), // Updated vehicle
            'size' => $request->input('size'), // Updated size
        ]);

        // Use Toastr for a success message
        toastr()->timeOut(10000)->closeButton()->success('Order finalization updated successfully.');
    } else {
        toastr()->error('No finalization record found for this order.');
    }

    return redirect()->back();
}


public function showUsers()
{
    // Fetch all users from the database
    $users = User::paginate(10);

    // Pass the users to the view
    return view('admin.user', compact('users'));
}

public function editUser($id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Return the modal view (this will be used inside a modal)
    return response()->json(['user' => $user]);
}

public function updateUser(Request $request, $id)
{
    // Validate the user type
    $request->validate([
        'usertype' => 'required|string|in:user,admin', // assuming user types are 'user' or 'admin'
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Store the old usertype to check if it has changed
    $oldUserType = $user->usertype;

    // Update the user type
    $user->usertype = $request->usertype;
    $user->save();

    // If the usertype has been updated and it's not the same as the old one,
    // log the user out and redirect them to the login page.
    if ($oldUserType !== $user->usertype) {
        // Check if the user whose type has changed is the logged-in user
        if ($user->id == Auth::id()) {
            // Log the user out whose type was changed
            Auth::logout();

            // Invalidate the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Show success message and redirect to login
            toastr()->success('Your user type has been updated. Please log in again.');
            return redirect()->route('login'); // Laravel’s default login route
        }

        toastr()->success('User type updated successfully!');
    }

    // Redirect back to the users list
    return redirect()->route('admin.users'); // Redirect back to the users list page
}







public function deleteUser($id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Return success message
    toastr()->success('User deleted successfully!');

    // Fetch the updated list of users
    $users = User::paginate(10);

    // Return the view with updated users list
    return view('admin.user', compact('users'));
}
    


    // Show slot availability to admin
    public function showSlotAvailability()
    {
        // Fetch the first record, or create one if it doesn't exist
        $slotAvailability = SlotAvailability::first();

        // If no record, create a default entry
        if (!$slotAvailability) {
            $slotAvailability = SlotAvailability::create(['status' => 'all_available']);
        }

        // Pass the slotAvailability variable to the view
        return view('admin.slot_availability', compact('slotAvailability'));
    }

    public function updateSlotAvailability(Request $request)
    {
        $request->validate([
            'status' => 'required|in:all_available,one_available,no_available',
        ]);
    
        // Find the first record or create a new one
        $slotAvailability = SlotAvailability::first();
    
        if (!$slotAvailability) {
            $slotAvailability = SlotAvailability::create(['status' => $request->status]);
        } else {
            // Update the status
            $slotAvailability->update(['status' => $request->status]);
        }
    
        // Return JSON response for frontend
        return response()->json([
            'status' => 'success',
            'message' => 'Slot availability updated successfully!',
            'newStatus' => ucfirst($slotAvailability->status),  // Capitalize the first letter for display
        ]);
    }
    

}
