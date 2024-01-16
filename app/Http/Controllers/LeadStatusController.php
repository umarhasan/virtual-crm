<?php

namespace App\Http\Controllers;

use App\Models\LeadStatus;
use Illuminate\Http\Request;

class LeadStatusController extends Controller
{
    public function index()
    {
        $leadStatuses = LeadStatus::all();
        return view('lead_status.index', compact('leadStatuses'));
    }

    public function create()
    {
        return view('lead_status.create');
    }

    public function store(Request $request)
    {
        LeadStatus::create($request->all());
        return redirect()->route('leadStatus.index');
    }

    public function edit(LeadStatus $leadStatus)
    {
        return view('lead_status.edit', compact('leadStatus'));
    }

    public function update(Request $request, LeadStatus $leadStatus)
    {
        $leadStatus->update($request->all());
        return redirect()->route('leadStatus.index');
    }

    public function destroy(LeadStatus $leadStatus)
    {
        $leadStatus->delete();
        return redirect()->route('leadStatus.index');
    }
}
