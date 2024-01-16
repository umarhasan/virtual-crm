<?php

namespace App\Http\Controllers;

use App\Models\LeadSources;
use Illuminate\Http\Request;

class LeadSourcesController extends Controller
{
    public function index()
    {
        $LeadSources = LeadSources::all();
        return view('lead_sources.index', compact('LeadSources'));
    }

    public function create()
    {
        return view('lead_sources.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
           
        ]);

        LeadSources::create($request->all());

        return redirect()->route('leadSources.index')->with('success', 'Lead Sources created successfully');
    }

    public function show($id)
    {
        $LeadSources = LeadSources::findOrFail($id);
        return view('lead_sources.show', compact('LeadSources'));
    }

    public function edit($id)
    {
        $LeadSources = LeadSources::findOrFail($id);
        return view('lead_sources.edit', compact('LeadSources'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $LeadSources = LeadSources::findOrFail($id);
        $LeadSources->update($request->all());

        return redirect()->route('leadSources.index')->with('success', 'Leads Sources updated successfully');
    }

    public function destroy($id)
    {
        $LeadSources = LeadSources::findOrFail($id);
        $LeadSources->delete();
        return redirect()->route('leadSources.index')->with('success', 'Lead Sources deleted successfully');
    }
}
