<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Auth;


class AttendanceController extends Controller
{
    public function index()
    {
        try 
        {
            $data['attendance'] = Attendance::with('users')->get();
            return view('attendance.index',$data);
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    
    public function create()
    {
            $data['users'] = User::get();
            $data['attendance'] = Attendance::get();
            return view('attendance/create' ,$data);
    }

    public function store(Request $request)
    {

        
        try 
        {
            $time = date('H:i:s');
            $day = date('D');
    
            $current_time = date("H:i:s");
            $grace_time = strtotime('+15 minutes', strtotime($current_time));
            $date = date("H:i:s", $grace_time);
           
            $user_id = Auth::id();
    
            Attendance::create([
                'user_id' => request()->input('user_id'),
                'time_in' => request()->input('time_in'),
                'time_out' => request()->input('time_out'),
            ]);
    
            // The try block should end here

            return redirect()->to('attendance')->with('success', 'Attendance Created Successfully');
    
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id){
        $attendance = Attendance::find($id);

        if($attendance){
            $attendance->delete();
            return redirect()->to('attendance')->with('Attendance Delete successfully');

        }
       
    else {
        return redirect()->to('attendance')->with('error', 'Attendance not found.');
    }

    }
    
    public function edit($id){

        $data['attendance']  = Attendance::find($id);
        return view('attendance/edit', $data);
    }

    public function update($id, Request $request){
        try 
        {
            $time = date('H:i:s');
            $day = date('D');
    
            $current_time = date("H:i:s");
            $grace_time = strtotime('+15 minutes', strtotime($current_time));
            $date = date("H:i:s", $grace_time);
           
            $user_id = Auth::id();
    
            $attendance = Attendance::find($id);
        
            $attendance->update([
                'user_id' => $user_id,
                'time_in' => request()->input('time_in'),
                'time_out' => request()->input('time_out'),
            ]);
    
            // The try block should end here

            return redirect()->to('attendance')->with('success', 'Attendance Updated Successfully');
    
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

}
