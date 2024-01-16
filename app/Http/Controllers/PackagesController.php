<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\User;
use Session;
use Auth;

class PackagesController extends Controller
{
    public function index()
    {

        $data['package'] = Package::with('users')->get();
        return view('package/index',$data);
    }

   
    public function create()
    {
        $data['users'] = User::get();
        return view('package/create', $data);
    }
    
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'package_name'=> 'required',
            'package_amount'=> 'required',
            'description'=> 'required',
            'period' => 'required',

            // other validation rules for your form fields
        ]);
            
            $package = Package::create([
                'package_name' => request()->input('package_name'),
                'package_amount' => request()->input('package_amount'),
                'description' => request()->input('description'),
                'period' => request()->input('period'),
                'user_id' => Auth::id(),
            
            ]);
            session::flash('success','Record Uploaded Successfully');
            return redirect('package')->with('success','Record Uploaded Successfully');
    }

   
   
   
    public function edit($id)
    {
        $data['users'] = User::get();
        $data['package'] = Package::find($id);
        //dd($package);
        return view('package.packageEdit', $data);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name'=> 'required',
            'package_amount'=> 'required',
            'description'=> 'required',
            'period' => 'required',
            // other validation rules for your form fields
        ]);
            

        $package = Package::find($id);
        $package->update([
            'package_name' => request()->input('package_name'),
            'package_amount' => request()->input('package_amount'),
            'description' => request()->input('description'),
            'period' => request()->input('period'),
            'user_id' => Auth::id(),
        ]);

       
        return redirect('package')->with('success','Record Uploaded Successfully');
          
    }

   
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        session::flash('success','Record has been deleted Successfully');
        return redirect('packages');
    }
}
