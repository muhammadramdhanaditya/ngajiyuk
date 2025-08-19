<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;

class User extends Component
{

    public $class_id;
    public $userclass;

    public function mount()
    {
        if ($this->userclass !== null) {
            $this->class_id = $this->userclass[0]->class->id;
        }
    }

    public function render()
    {
        $data['userclass'] = $this->userclass;
        return view('livewire.admin.class.user', $data);
    }
}
