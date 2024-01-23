<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\VeriantSize;
use App\Models\VeriantColor;
use App\Models\User;
use Auth;
use Session;

class ProductController extends Controller
{
    
    
    public function index()
	{
        $userid =  Auth::user()->roles['0']->pivot->role_id;
        $role = Role::find($userid)->name;
        // return Product::join("role_has_permissions","role_has_permissions.role_id","=",$userid)->get();
		if($role != 'Admin')
        {   
            $data['product'] = Product::where('user_id',Auth::user()->id)->get();
        }
        else
        {
            $data['product'] = Product::get();
        }

	    return view('product.index', $data);
	}

     public function create(Request $request){
        //  $categories = Category::get();
        //  $subcat = SubCategory::get();
         $product = User::get();
         return view('product.create');
     }

     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required',      
             'Amount' =>'required',
             'description' =>'required',
         ]);
     
         // Assuming you have a Product model at the top of your file, like: use App\Models\Product;
         $product =  Product::create([
             'name' => $request->input('name'),
             'Amount' => $request->input('Amount'),
             'description' => $request->input('description'),
             'user_id' => Auth::id(),
         ]);
    
         session::flash('success','Record Uploaded Successfully');
         return redirect('product')->with('success','Record Uploaded Successfully');
     }

     
   
    public function edit($id)
    {
        $data['users'] = User::get();
        $data['product'] = Product::find($id);
        return view('product.Edit', $data);
    }

   
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => request()->input('name'),
            'Amount' => request()->input('Amount'),
            'description' => request()->input('description'),
            'user_id' => Auth::id(),
        ]);

       
        return redirect('product')->with('success','Record Uploaded Successfully');
          
    }

    public function FetchProduct(){
        $products = Product::all();
        return response()->json($products);

    }

 
    
} 
