<?php

namespace App\Livewire\Dashboard;

use App\Models\ClassModel;
use App\Models\GalleryModel;
use App\Models\SettingModel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Landing extends Component
{

    public function mount()
    {
        if (session()->has('user')) {
            LivewireAlert::title(session('user.title'))
                ->text(session('user.text'))
                ->toast()
                ->position('top-end')
                ->success()
                ->show();
        }
    }
    public function render()
    {
        $data['settings'] = SettingModel::first();
        $data['gallerys'] = GalleryModel::where(['type' => 'home'])->with(['pics'])->get();
        $data['classes'] = ClassModel::with(['location', 'teacher'])->get();
        return view('livewire.dashboard.landing', $data);
    }
}
