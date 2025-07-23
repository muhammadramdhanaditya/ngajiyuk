<?php

namespace App\Livewire\Dashboard;

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
        return view('livewire.dashboard.landing');
    }
}
