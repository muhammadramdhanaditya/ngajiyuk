<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\GalleryModel;
use App\Models\SettingModel;
use App\Models\TeacherModel;
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
    public function editClass($id)
    {
        $data['classes'] = ClassModel::find($id);
        return view('admin.class.edit', $data);
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
    public function addTeacher()
    {
        return view('admin.teacher.add');
    }
    public function editTeacher($id)
    {
        $data['teacher'] = TeacherModel::find($id);
        return view('admin.teacher.edit', $data);
    }

    public function user()
    {
        return view('admin.user.index');
    }

    public function contact()
    {
        return view('admin.contact.index');
    }

    public function transaction()
    {
        return view('admin.transaction.index');
    }


    public function setting()
    {

        $data['settings'] = SettingModel::first();
        return view('admin.setting.index', $data);
    }

    public function gallery()
    {
        return view('admin.gallery.index');
    }
    public function addGallery()
    {
        return view('admin.gallery.add');
    }
    public function editGallery($id)
    {
        $data['gallerys'] = GalleryModel::with('pics')->find($id);
        return view('admin.gallery.edit', $data);
    }
}
