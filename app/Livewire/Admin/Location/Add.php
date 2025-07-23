<?php

namespace App\Livewire\Admin\Location;

use App\Models\LocationModel;
use Livewire\Component;

class Add extends Component
{

    public $id;
    public $name;
    public $type = 'offline';
    public $link;
    public $detail_address;
    public $note;
    public function render()
    {
        return view('livewire.admin.location.add');
    }

    public function storeLocation()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        LocationModel::create([
            'name' => $this->name,
            'type' => $this->type,
            'link' => $this->link,
            'detail_address' => $this->detail_address,
            'note' => $this->note,
        ]);
        session()->flash('store', [
            'title' => 'Berhasil membuat Lokasi',
        ]);
        return redirect()->route('admin-location');
    }
}
