<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\ClassModel;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Index extends Component
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
        $data = [
            'classes' => ClassModel::all(),
            'total_class' => ClassModel::count()
        ];
        return view('livewire.admin.dashboard.index', $data);
    }
}
