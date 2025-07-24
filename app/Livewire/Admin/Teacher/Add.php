<?php

namespace App\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\TeacherModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Add extends Component
{
    use WithFileUploads;
    public $id;
    public $name;
    public $category;
    public $profilePhoto;
    public $profilePhotoUrl;
    public $note;

    public function render()
    {
        return view('livewire.admin.teacher.add');
    }

    public function storeTeacher()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'profilePhoto' => 'nullable|image|max:5000',
        ]);

        if ($this->profilePhoto) {
            if ($this->profilePhotoUrl) {
                Storage::delete(str_replace('/storage', 'public', $this->profilePhotoUrl));
            }
            $path = $this->profilePhoto->store('public/profile-teacher');
            $data['profile_photo_url'] = Storage::url($path);
            $this->profilePhotoUrl = $data['profile_photo_url'];
        }

        TeacherModel::create([
            'name' => $this->name,
            'category' => $this->category,
            'note' => $this->note,
            'profile_photo_url' => $this->profilePhotoUrl,
        ]);
        $this->profilePhoto = null;
        session()->flash('store', [
            'title' => 'Berhasil membuat Guru Baru',
        ]);
        return redirect()->route('admin-teacher');
    }
}
