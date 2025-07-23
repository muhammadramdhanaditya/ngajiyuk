<?php

namespace App\Livewire\Login;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


class Login extends Component
{
    public $email, $password;

    public function mount()
    {
        if (session()->has('store')) {
            LivewireAlert::title(session('store.title'))
                ->text(session('store.text'))
                ->toast()
                ->position('top-end')
                ->success()
                ->show();
        }
    }


    public function render()
    {
        return view('livewire.login.login');
    }

    public function storeLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            $user = Auth::user();

            session()->flash('user', [
                'title' => 'Berhasil Login',
                'text' => 'Selamat datang, ' . $user->name,
            ]);

            if ($user->role == 'admin') {
                return redirect()->intended('admin');
            } else {
                return redirect()->intended('/');
            }
        }



        $this->addError('email', 'Email atau password salah');
    }
}
