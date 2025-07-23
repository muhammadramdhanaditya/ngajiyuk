<?php

namespace App\Livewire\Schedule;

use Livewire\Component;

class Index extends Component
{
    public $selectedClasses = [];

    public function render()
    {
        return view('livewire.schedule.index');
    }


    public function selectClass($classId)
    {
        if (in_array($classId, $this->selectedClasses)) {
            $this->selectedClasses = array_diff($this->selectedClasses, [$classId]);
        } else {
            $this->selectedClasses[] = $classId;
        }
    }
}
