<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects =Projects::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            // 'year_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'details' => 'required|string',
            'summary' => 'required |string',
            'professor' => 'required|string',
        ]);
        $imagePath=$request->file('image')->store('public/project_images');

        Project::create([
           'name'=>$request->input('name'),
           'image'=>$imagePath,
           'details'=>$request->input('details'),
           'summary'=>$request->input('summary'),
           'professor'=>$request->input('professor'),
        ]);
        return redirect()->route('projects.index')->with('success','Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show',compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'details' => 'required|string',
            'summary' => 'required |string',
            'professor' => 'required|string',
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/project_images');
            $project->update(['image'=> $imagePath]);
      }
      $project->update([
        'name'=>$request->input('name'),
        'details'=>$request->input('details'),
        'summary'=>$request->input('summary'),
        'professor'=>$request->input('professor'),
      ]);
      return redirect()->route('projects.index')->with('success','Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        
        $project->delete();
        return redirect()->route('projects.index')->with('success','Project deleted successfully');
    }
}
