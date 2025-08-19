<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Evaluation extends Component
{
    public $users_id;
    public $class_id;
    public $category_class;
    public $evaluations;

    public function mount()
    {
        if ($this->users_id !== null) {
            $this->users_id = $this->users_id;
        }
        if ($this->class_id !== null) {
            $this->class_id = $this->class_id;
        }
        if ($this->category_class !== null) {
            $this->category_class = $this->category_class;
        }
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
        $data['evaluations'] = $this->evaluations;
        return view('livewire.admin.class.evaluation', $data);
    }
}
