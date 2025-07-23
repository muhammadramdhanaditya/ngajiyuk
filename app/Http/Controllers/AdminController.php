<?php

namespace App\Http\Controllers;

use App\Models\LocationModel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function class()
    {
        return view('admin.class.index');
    }
    public function addClass()
    {
        return view('admin.class.add');
    }

    public function location()
    {
        return view('admin.location.index');
    }
    public function addLocation()
    {
        return view('admin.location.add');
    }
    public function editLocation($id)
    {
        $data['location'] = LocationModel::find($id);
        return view('admin.location.edit', $data);
    }

    public function teacher()
    {
        return view('admin.teacher.index');
    }
}
