<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\WorkerProject;
class WorkerController extends Controller
{
    public function index()
    {
        $users = User::where('login_type','worker')->paginate(5);
        return view('admin.worker',compact('users'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->input('password'));
        $user->login_type = 'worker';
        $user->save();

        return back()->with('success','Worker Added Successfully!');
    }

    public function assign_project(Request $request)
    {
        $this->validate($request, [
            'worker_id' => 'required',
            'project_id' => 'required',
        ]);

        $wp = new WorkerProject;
        $wp->worker_id = $request->worker_id;
        $wp->project_id = $request->project_id;
        $wp->save();

        return back()->with('success','Project Assign To Worker Successfully!');
    }

    public function assignedproject()
    {
        // dd($id);
        $data = User::where('id',auth()->user()->id)->first();
        return view('worker.assignedproject',compact('data'));
    }
}
