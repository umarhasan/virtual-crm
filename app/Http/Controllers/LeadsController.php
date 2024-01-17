<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads;
use App\Models\LeadStatus;
use App\Models\LeadSources;
use App\Models\User;
use App\Models\UserLead;
use Auth;

class LeadsController extends Controller
{
    public function index()
    {
        $leads = Leads::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        $leadStatus = LeadStatus::get();
        $LeadSources = LeadSources::get();
        $MemberUser = User::withRole('Member')->get();
        
        return view('leads.create',compact('leadStatus','LeadSources','MemberUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'user_member' => 'nullable|exists:user_members,id',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|string|url|max:255',
            'country' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'default_language' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new lead
        $lead = new Leads();
        $lead->name = $request->input('name');
        $lead->source = $request->input('source');
        $lead->company_name = $request->input('company_name');
        $lead->position = $request->input('position');
        $lead->status = $request->input('status');
        $lead->user_member_id = $request->input('user_member');
        $lead->phone = $request->input('phone');
        $lead->website = $request->input('website');
        $lead->country = $request->input('country');
        $lead->tags = $request->input('tags');
        $lead->default_language = $request->input('default_language');
        $lead->description = $request->input('description');
        $lead->public = $request->has('public');
        $lead->contacted_today = $request->has('contacted_today');
        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Leads created successfully');
    }

    public function show($id)
    {
        $Leads = Leads::with('Source','Status')->where('id',$id)->first();
        return view('leads.show', compact('Leads'));
    }

    public function edit($id)
    {
        $lead = Leads::findOrFail($id);
        $leadStatus = LeadStatus::get();
        $LeadSources = LeadSources::get();
        $MemberUser = User::withRole('Member')->get();
        return view('leads.edit', compact('lead','leadStatus','LeadSources','MemberUser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'user_member' => 'nullable|exists:user_members,id',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|string|url|max:255',
            'country' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'default_language' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $lead = Leads::findOrFail($id);
        $lead->name = $request->input('name');
        $lead->source = $request->input('source');
        $lead->company_name = $request->input('company_name');
        $lead->position = $request->input('position');
        $lead->status = $request->input('status');
        $lead->user_member_id = $request->input('user_member');
        $lead->phone = $request->input('phone');
        $lead->website = $request->input('website');
        $lead->country = $request->input('country');
        $lead->tags = $request->input('tags');
        $lead->default_language = $request->input('default_language');
        $lead->description = $request->input('description');
        $lead->public = $request->has('public');
        $lead->contacted_today = $request->has('contacted_today');
        $lead->save();
    
        return redirect()->route('leads.index')->with('success', 'Lead updated successfully');
    }

    public function destroy($id)
    {
        $leads = Leads::findOrFail($id);
        $leads->delete();

        return redirect()->route('leads.index')->with('success', 'Leads deleted successfully');
    }

    public function LeadAccepted($id){
        $userLead = new UserLead();
        $userLead->lead_id = $id;
        $userLead->user_id  = Auth::id();
        $userLead->status = 'pick';
        $userLead->save();


        return redirect()->route('leads.index')->with('success', 'Leads Pick successfully');
    }

    public function LeadsPick(){
        $user_id = Auth::id();
        $lead_pick = UserLead::with('users','leads')->where('user_id',$user_id)->whereIn('status',['pending','pick','rejected'])->get();
        return view('leads.leads_pick',compact('lead_pick'));
        
    }

    public function LeadsMarkConvert(Request $request){
        
        $userLead = UserLead::where('lead_id',$request->lead_id)->first();
        $userLead->status = $request->status;
        $userLead->comment = $request->lead_comment;
        $userLead->amount = $request->lead_amount;
        $userLead->save();
        
        return redirect()->back();
    }

    public function LeadsUserInvoice(){
        $user_id = Auth::id();
        $lead_accepted = UserLead::with('users','leads')->where('user_id',$user_id)->whereIn('status',['accepted'])->get();
        return view('leads.invoice',compact('lead_accepted'));
    }

    public function LeadsInvoiceShow($id){
        
        $invoice = UserLead::with('users','leads')->where('lead_id',$id)->first();
        return view('leads.invoice_show',compact('invoice'));
    }
}
