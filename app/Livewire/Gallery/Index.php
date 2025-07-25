<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use App\Models\GalleryModel;

class Index extends Component
{
    public function render()
    {
        $data['gallerys'] = GalleryModel::where(['type' => 'gallery'])->with(['pics'])->get();
        return view('livewire.gallery.index', $data);
    }
}
