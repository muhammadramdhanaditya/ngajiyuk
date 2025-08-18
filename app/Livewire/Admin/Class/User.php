<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;

class User extends Component
{

    public $userclass;


    public function render()
    {
        $data['userclass'] = $this->userclass;
        return view('livewire.admin.class.user', $data);
    }
}
