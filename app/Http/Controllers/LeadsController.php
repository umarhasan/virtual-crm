<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads;
use App\Models\LeadStatus;
use App\Models\LeadSources;
use App\Models\User;
use App\Models\UserLead;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Auth;

class LeadsController extends Controller
{
    public function index()
    {
        $leads = Leads::with('LeadsUser')->get();
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

    public function LeadAccepted($id)
    {
        // Check if the user has already picked the lead
        $existingUserLead = UserLead::where('lead_id', $id)
            ->where('user_id', Auth::id())
            ->first();
        if ($existingUserLead) {
            return redirect()->route('leads.index')->with('error', 'You have already picked this lead.');
        }
    
        // If the user has not picked the lead before, proceed to save the new UserLead record
        $userLead = new UserLead();
        $userLead->lead_id = $id;
        $userLead->user_id = Auth::id();
        $userLead->status = 'pick';
        $userLead->save();
    
        return redirect()->route('leads.index')->with('success', 'Leads picked successfully');
    }

    public function LeadsPick(){
        $user_id = Auth::id();
        $lead_pick = UserLead::with('users','leads')->where('user_id',$user_id)->whereIn('status',['pending','pick','rejected','accepted'])->get();
        return view('leads.leads_pick',compact('lead_pick'));
        
    }

    public function LeadsMarkConvert(Request $request){
       
        $total_amount = array_sum($request->input('amount'));
        $total_qty = array_sum($request->input('qty'));
        $description = json_encode($request->input('description'));
        $product = json_encode($request->input('product'));
        
        $userLead = UserLead::where('lead_id',$request->lead_id)->first();
       
        $userLead->lead_id      =        $request->lead_id;
        $userLead->user_id      =        Auth::id();
        $userLead->amount       =        isset($total_amount) ? $total_amount : 0;
        $userLead->qty          =        isset($total_qty) ? $total_qty : 0;
        $userLead->description  =        $description;
        $userLead->product      =        $product;
        $userLead->comment      =        $request->comment;
        $userLead->total_amount =        $total_amount * $total_qty;
        $userLead->amount_paid  =        $request->amount_paid;
        $userLead->status       =        'accepted';
        $userLead->save();
        

        $invoice = Invoice::create([
            'user_id' => Auth::id(),
            'invoice_id' => $request->invoice_id,
            'lead_id' => $request->lead_id,
            'comment' => $request->comment,
            'status' => 'inprocess', // Adjust as needed
            'total_amount' => $total_amount * $total_qty,
            'amount_paid' => $request->amount_paid,
        ]);
    
        // Insert details into the invoice_details table
        foreach ($request->input('product') as $key => $product) {
            InvoiceDetail::create([
                'invoice_id' => $request->invoice_id,
                'product' => $product,
                'description' => $request->input('description')[$key],
                'amount' => $request->input('amount')[$key],
                'qty' => $request->input('qty')[$key],
                'total_amount' => $request->input('amount')[$key] * $request->input('qty')[$key],
            ]);
        }


        return redirect()->back();
    }

    public function LeadsUserInvoice(){
        $user_id = Auth::id();
        if($user_id == 1){
            $lead_accepted = UserLead::with('users','leads')->whereIn('status',['accepted'])->get();
        }else{
            $lead_accepted = UserLead::with('users','leads')->where('user_id',$user_id)->whereIn('status',['accepted'])->get();
        }
        return view('leads.invoice',compact('lead_accepted'));
    }

    public function LeadsInvoiceShow($id)
    {
        $invoice = UserLead::with('users', 'leads')->where('lead_id', $id)->first();
        $user = Auth::user()->name;
        $products = Product::get();
    
        return view('leads.invoice_show', compact('invoice', 'products'));
    }
}
