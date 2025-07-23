<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


class Index extends Component
{
    use WithFileUploads;

    public $id;
    public $user;
    public $name;
    public $email;
    public $phone;
    public $profilePhoto;
    public $profilePhotoUrl;
    public $role;
    public $isAdminRequest;

    public function mount()
    {
        $this->user = Auth::user();
        $this->id = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->profilePhotoUrl = $this->user->profile_photo_url;
        $this->role = $this->user->role;
        $this->isAdminRequest = $this->user->is_admin_request;
    }

    public function render()
    {
        return view('livewire.admin.profile.index');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'phone' => 'nullable|string|max:20',
            'profilePhoto' => 'nullable|image|max:5000',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];

        if ($this->profilePhoto) {
            if ($this->profilePhotoUrl) {
                Storage::delete(str_replace('/storage', 'public', $this->profilePhotoUrl));
            }
            $path = $this->profilePhoto->store('public/profile-photos');
            $data['profile_photo_url'] = Storage::url($path);
            $this->profilePhotoUrl = $data['profile_photo_url'];
        }

        if ($this->id) {
            UserModel::where('id', $this->id)->update($data);
            $this->user = UserModel::find($this->id);
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->phone = $this->user->phone;
            $this->profilePhotoUrl = $this->user->profile_photo_url;
        }

        $this->profilePhoto = null;
        LivewireAlert::title('Berhasil Update Profile')
            ->toast()
            ->position('top-end')
            ->success()
            ->show();
    }
}
