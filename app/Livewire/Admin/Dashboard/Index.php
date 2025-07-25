<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
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
        return view('livewire.admin.dashboard.index');
    }
}
