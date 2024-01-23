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
    function __construct()
    {
        //  $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:product-list', ['only' => ['index']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-status', ['only' => ['status']]);
         
    }
    
    public function index()
	{
            $data['product'] = Product::with('users')->get();   
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
        //dd($product);
        return view('product.Edit', $data);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'Amount'=> 'required',
            'description'=> 'required',
        
            // other validation rules for your form fields
        ]);
            

        $product = Product::find($id);
        $product->update([
            'name' => request()->input('name'),
            'Amount' => request()->input('Amount'),
            'description' => request()->input('description'),
            'user_id' => Auth::id(),
        ]);

       
        return redirect('product')->with('success','Record Uploaded Successfully');
          
    }

     public function destroy($id)
     {
         $product = Product::find($id);
         $product->delete();
         session::flash('success','Record has been deleted Successfully');
         return redirect('product');
     }
     

 
    
} 
