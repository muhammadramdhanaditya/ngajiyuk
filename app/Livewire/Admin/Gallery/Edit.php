<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;
use App\Models\GalleryModel;
use Livewire\WithFileUploads;
use App\Models\GalleryPicModel;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Edit extends Component
{
    use WithFileUploads;

    public $id;
    public $name;
    public $note;
    public $pics = [];
    public $existingPics = [];
    public $gallery;

    public function mount()
    {
        if ($this->gallery !== null) {
            $this->id = $this->gallery->id;
            $this->name = $this->gallery->name;
            $this->note = $this->gallery->note;
            $this->existingPics = $this->gallery->pics->toArray();
        }
    }

    public function render()
    {
        return view('livewire.admin.gallery.edit');
    }

    public function storeEditGallery()
    {
        $this->validate([
            'name' => 'required',
            'note' => 'nullable',
            'pics.*' => 'nullable|image|max:5120',
        ]);

        // Update data gallery
        $gallery = GalleryModel::find($this->id);
        $gallery->update([
            'name' => $this->name,
            'note' => $this->note,
        ]);

        $remainingPicIds = collect($this->existingPics)->pluck('id')->toArray();

        $picsToDelete = $gallery->pics()
            ->whereNotIn('id', $remainingPicIds)
            ->get();

        foreach ($picsToDelete as $pic) {
            $filePath = str_replace('/storage', 'public', $pic->pic_url);
            Storage::delete($filePath);
            $pic->delete();
        }

        foreach ($this->pics as $pic) {
            $path = $pic->store('public/gallery');
            GalleryPicModel::create([
                'gallery_id' => $gallery->id,
                'pic_url' => Storage::url($path),
            ]);
        }

        session()->flash('store', [
            'title' => 'Berhasil mengedit Gallery',
        ]);

        return redirect()->route('admin-gallery');
    }

    public function removeExistingPic($picId)
    {
        $galleryPic = GalleryPicModel::find($picId);

        if ($galleryPic) {
            $filePath = str_replace('/storage', 'public', $galleryPic->pic_url);
            Storage::delete($filePath);

            $galleryPic->delete();

            $this->existingPics = array_filter($this->existingPics, function ($pic) use ($picId) {
                return $pic['id'] != $picId;
            });

            GalleryPicModel::destroy($picId);

            LivewireAlert::title('Berhasil menghapus gambar')
                ->toast()
                ->position('top-end')
                ->success()
                ->show();
        }
    }

    public function removeUploadedPic($index)
    {
        unset($this->pics[$index]);
        $this->pics = array_values($this->pics);
    }
}
