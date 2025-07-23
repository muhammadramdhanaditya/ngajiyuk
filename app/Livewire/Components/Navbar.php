<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.components.navbar');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        $this->flash('success', 'Anda berhasil logout');
        return redirect('/');
    }
}
