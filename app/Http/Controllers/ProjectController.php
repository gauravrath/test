<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(5);
        $users = User::where('login_type','worker')->get();
        return view('admin.project',compact('projects','users'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'project' => 'required',
        ]);

        $pro = new Project;
        $pro->project = $request->project;
        $pro->save();

        return back()->with('success','Project Added Successfully!');
    }


    public function assignedwork(Request $request, $id)
    {
        // dd($id);
        $data = Project::where('id',$id)->first();
        return view('admin.assignedwork',compact('data'));
    }
}
