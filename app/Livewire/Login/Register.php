<?php

namespace App\Livewire\Login;

use App\Models\UserModel;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;


class Register extends Component
{
    public $name, $email, $phone, $password, $password_confirmation;
    public function render()
    {
        return view('livewire.login.register');
    }

    public function storeRegister()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        UserModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role' => 'peserta',
        ]);
        session()->flash('store', [
            'title' => 'Berhasil membuat Akun',
            'text' => 'Silahkan Login',
        ]);
        return redirect()->route('login');
    }
}
