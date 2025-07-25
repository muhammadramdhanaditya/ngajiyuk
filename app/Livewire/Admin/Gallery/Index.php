<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;
use App\Models\GalleryModel;
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
        $data['gallerys'] = GalleryModel::with(['pics'])->get();
        return view('livewire.admin.gallery.index', $data);
    }

    public function destroy($id)
    {
        GalleryModel::destroy($id);
        session()->flash('store', [
            'title' => 'Berhasil Menghapus Gallery',
        ]);
        return $this->redirect(route('admin-gallery'), navigate: true);
    }
}
