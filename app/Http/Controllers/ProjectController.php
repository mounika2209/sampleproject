<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\User;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $projects = ProjectModel::all();
        return view('project.index',['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'first_name' => 'required',
            'location' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]); 

        ProjectModel::create($request->all());

        return redirect()->route('home')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = ProjectModel::find($id); 
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = ProjectModel::find($id);
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $request->validate([
            'first_name' => 'required',
            'location' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        $project = ProjectModel::find($id);
        $project->first_name = $request->get('first_name');
        $project->last_name = $request->get('last_name');
        $project->location = $request->get('location');
        $project->address = $request->get('address');
        $project->phone_number = $request->get('phone_number');
        $project->save();
        
        return redirect()->route('home')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = ProjectModel::find($id);
        $project->delete();

        return redirect()->route('home')
            ->with('success', 'Project deleted successfully');
    }
}
