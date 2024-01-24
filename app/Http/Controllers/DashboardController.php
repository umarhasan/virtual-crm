<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Leads;
use App\Models\Order;
use App\Models\Product;
use Session;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Auth::user();
        
        $data['users'] = User::where('created_by', Auth::id())->count();
        $data['project'] = Project::count();
        $data['client'] = Client::count();
        $data['leads'] = Leads::count();
      
        return view('home',$data);
    }
    
    public function profile()
    {

      
        return view('profile');
    }
    
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
        ]);
    
        $input = $request->all();
    
        $user = User::find($id);
        $user->update($input);

        session::flash('success','Record Updated Successfully');
        return redirect()->back();

    }

    public function edit($id)
        {
            $data['user'] = User::find($id);
            $profile = $user->profile; // assuming there is a one-to-one relationship between User and Profile

            return view('profile', $data);
        }

    public function profileupdate(Request $request){

        // dd($request->all());

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->address = $request->address;
        $user->image = $request->image;
        $user->created_by = auth()->user()->id;
        $user->save();
        
       

        session::flash('success','Record Updated Successfully');
        return redirect('profile')->with('success','Record Uploaded Successfully');
}

    public function upload(Request $request)
    {
        // dd($request->all());
        // dd($request->file('profile')->getClientoriginalName());

        $user = User::find(Auth::user()->id);

        $file = $request->file('profile');
            $fileName = $file->getClientOriginalName() . time() . "Hatch-social." . $file->getClientOriginalExtension();
            $file->move('uploads/user/', $fileName);
    
       
        $user->image = $fileName;
        $user->save();
       

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

   
}
