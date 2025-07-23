<?php

namespace App\Livewire\Admin\Location;

use Livewire\Component;
use App\Models\LocationModel;

class Edit extends Component
{
    public $id, $name, $type, $link, $detail_address, $note;
    public $location;


    public function mount()
    {
        if ($this->location !== null) {
            $this->id = $this->location->id;
            $this->name = $this->location->name;
            $this->type = $this->location->type;
            $this->link = $this->location->link;
            $this->detail_address = $this->location->detail_address;
            $this->note = $this->location->note;
        }
    }

    public function storeEditLocation()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = [
            'name' => $this->name,
            'type' => $this->type,
            'link' => $this->link,
            'detail_address' => $this->detail_address,
            'note' => $this->note,
        ];

        LocationModel::where('id', $this->id)->update($data);

        session()->flash('store', [
            'title' => 'Berhasil mengedit Lokasi',
        ]);
        return redirect()->route('admin-location');
    }

    public function render()
    {
        return view('livewire.admin.location.edit');
    }
}
