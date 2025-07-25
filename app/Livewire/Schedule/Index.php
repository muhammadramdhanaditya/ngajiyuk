<?php

namespace App\Livewire\Schedule;

use Livewire\Component;
use App\Models\ClassModel;

class Index extends Component
{
    public $selectedClasses = [];

    public function render()
    {
        $data['classes'] = ClassModel::with(['teacher', 'location'])->get();

        return view('livewire.schedule.index', $data);
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
