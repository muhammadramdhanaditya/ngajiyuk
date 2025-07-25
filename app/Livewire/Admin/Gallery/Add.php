<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;
use App\Models\GalleryModel;
use Livewire\WithFileUploads;
use App\Models\GalleryPicModel;
use Illuminate\Support\Facades\Storage;

class Add extends Component
{
    use WithFileUploads;

    public $id;
    public $name;
    public $note;
    public $pics = [];

    public function render()
    {
        return view('livewire.admin.gallery.add');
    }

    public function storeGallery()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'pics.*' => 'nullable|image|max:5120',
        ]);

        $gallery = GalleryModel::create([
            'name' => $this->name,
            'note' => $this->note,
            'type' => 'gallery',
        ]);

        foreach ($this->pics as $pic) {
            $path = $pic->store('public/gallery');
            GalleryPicModel::create([
                'gallery_id' => $gallery->id,
                'pic_url' => Storage::url($path),
            ]);
        }

        session()->flash('store', [
            'title' => 'Berhasil membuat Gallery Baru',
        ]);

        return redirect()->route('admin-gallery');
    }

    public function removeUploadedPic($index)
    {
        unset($this->pics[$index]);
        $this->pics = array_values($this->pics);
    }
}
