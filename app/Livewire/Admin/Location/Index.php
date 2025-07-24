<?php

namespace App\Livewire\Admin\Location;

use Livewire\Component;
use App\Models\LocationModel;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


class Index extends Component
{

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
        $data['locations'] = LocationModel::all();
        return view('livewire.admin.location.index', $data);
    }

    public function destroy($id)
    {
        LocationModel::destroy($id);
        session()->flash('store', [
            'title' => 'Berhasil Menghapus Lokasi',
        ]);
        return $this->redirect(route('admin-location'), navigate: true);
    }
}
