<?php

namespace App\Livewire\Admin\Class;

use App\Models\ClassModel;
use Livewire\Component;
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
        $data['classes'] = ClassModel::with(['teacher', 'location'])->get();
        // dd($data);
        return view('livewire.admin.class.index', $data);
    }

    public function destroy($id)
    {
        ClassModel::destroy($id);
        session()->flash('store', [
            'title' => 'Berhasil Menghapus Kelas',
        ]);
        return $this->redirect(route('admin-class'), navigate: true);
    }
}
