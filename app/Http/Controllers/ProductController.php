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
         $vendors = User::get();
         return view('product.create');
     }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            // 'company_users' => 'required',
            'amount' =>'required',
            'description' =>'required',
        ]);
        
        $product = Product::create([
            'name' => request()->input('name'),
            'user_id' => Auth::id(),
            'amount' => request()->input('amount'),
            'description' => request()->input('description'),
        ]);

        return redirect('product');

    }

    public function FetchProduct(){
        $products = Product::all();
        return response()->json($products);

    }
 
    
} 
