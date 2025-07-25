<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactUsModel;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Index extends Component
{

    public $id, $name, $phone, $message, $email;

    public function mount()
    {
        if (session()->has('store')) {
            LivewireAlert::title(session('store.title'))
                ->toast()
                ->position('top-end')
                ->success()
                ->show();
        }
    }

    public function render()
    {
        return view('livewire.contact.index');
    }

    public function storeContactUs()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
        ]);

        ContactUsModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);
        session()->flash('store', [
            'title' => 'Berhasil mengirim pesan ke admin',
        ]);
        return redirect()->route('contact');
    }
}
