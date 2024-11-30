<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function addTeam()
    {
        return view('admin.team');
    }

    //ad team member
    public function team_added(Request $req)
{
    $req->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'name' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
    ]);

    if (!is_dir(public_path('backend/team'))) {
        mkdir(public_path('backend/team'), 0777, true);
    }

    $imagePath = null;
    if ($req->hasFile('img')) {
        $image = $req->file('img');
        $name = $image->getClientOriginalName();
        $imageName = time() . "_" . $name;
        $imagePath = 'backend/team/' . $imageName;
        $image->move(public_path('backend/team'), $imageName);
    }

    $data['image'] = $imagePath; // Updated to match Blade file
    $data['name'] = $req->name;
    $data['department'] = $req->department;
    $data['facebook'] = $req->facebook;
    $data['twitter'] = $req->twitter;
    $data['instagram'] = $req->instagram;
    $data['linkedin'] = $req->linkedin;

    Team::create($data);
    toastr()->success('Team Member added successfully');
    return redirect()->back();
}


    //team List
    public function teamList()
    {
        $team = Team::orderBy('created_at', 'desc')->get();
        // $team = Team::all();
        return view('admin.team-member', ['team' => $team]);
    }

    //team Delete
    public function deleteTeam($id)
    {
        $service = Team::findOrFail($id); // Always check if the service exists before deleting
        $service->delete();
        return redirect()->back();
    }
}
