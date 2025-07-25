<?php

namespace App\Livewire\Admin\Contact;

use App\Models\ContactUsModel;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data['contacts'] = ContactUsModel::all();
        return view('livewire.admin.contact.index', $data);
    }
}
