<?php

namespace App\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\TeacherModel;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{

    public $id, $name, $category, $note, $profilePhotoUrl, $profilePhoto;
    public $teacher;


    public function mount()
    {
        if ($this->teacher !== null) {
            $this->id = $this->teacher->id;
            $this->name = $this->teacher->name;
            $this->category = $this->teacher->category;
            $this->note = $this->teacher->note;
            $this->profilePhotoUrl = $this->teacher->profile_photo_url;
        }
    }

    public function storeEditTeacher()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'profilePhoto' => 'nullable|image|max:5000',
        ]);

        $data = [
            'name' => $this->name,
            'category' => $this->category,
            'note' => $this->note,
        ];

        if ($this->profilePhoto) {
            if ($this->profilePhotoUrl) {
                Storage::delete(str_replace('/storage', 'public', $this->profilePhotoUrl));
            }
            $path = $this->profilePhoto->store('public/profile-teacher');
            $data['profile_photo_url'] = Storage::url($path);
            $this->profilePhotoUrl = $data['profile_photo_url'];
        }

        TeacherModel::where('id', $this->id)->update($data);

        session()->flash('store', [
            'title' => 'Berhasil mengedit Guru',
        ]);
        return redirect()->route('admin-teacher');
    }
    public function render()
    {
        return view('livewire.admin.teacher.edit');
    }
}
