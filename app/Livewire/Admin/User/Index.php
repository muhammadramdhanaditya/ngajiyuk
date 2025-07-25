<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\UserModel;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Index extends Component
{

    public $user;
    public $is_admin_request;

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

    public function updateAdminRequest($userId, $isChecked)
    {

        $value = $isChecked ? 2 : 0;

        UserModel::where('id', $userId)->update(['is_admin_request' => $value]);

        LivewireAlert::title('Berhasil mengubah akses admin')->toast()->position('top-end')->success()->show();
    }

    public function accAdmin($userId)
    {

        UserModel::where('id', $userId)->update(['is_admin_request' => 3, 'role' => 'admin']);

        LivewireAlert::title('Berhasil memberikan akses admin')->toast()->position('top-end')->success()->show();
    }

    public function cancelAdmin($userId)
    {

        UserModel::where('id', $userId)->update(['is_admin_request' => 0, 'role' => 'peserta']);

        LivewireAlert::title('Berhasil dikembalikan menjadi user')->toast()->position('top-end')->success()->show();
    }

    public function render()
    {
        $data['users'] = UserModel::where(['role' => 'peserta'])->get();
        $data['admins'] = UserModel::where(['role' => 'admin'])->get();
        return view('livewire.admin.user.index', $data);
    }

    public function destroy($id)
    {
        if ($id == 1) {
            session()->flash('store', [
                'title' => 'tidak bisa dihapus',
            ]);
        } else {
            UserModel::destroy($id);
            session()->flash('store', [
                'title' => 'Berhasil Menghapus Users',
            ]);
        }
        return $this->redirect(route('admin-user'), navigate: true);
    }
}
