<?php

namespace App\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\TeacherModel;
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
        $data['teachers'] = TeacherModel::all();
        return view('livewire.admin.teacher.index', $data);
    }

    public function destroy($id)
    {
        TeacherModel::destroy($id);
        session()->flash('store', [
            'title' => 'Berhasil Menghapus Guru',
        ]);
        return $this->redirect(route('admin-teacher'), navigate: true);
    }
}
