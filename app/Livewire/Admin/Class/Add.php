<?php

namespace App\Livewire\Admin\Class;

use App\Models\ClassModel;
use Livewire\Component;
use App\Models\TeacherModel;
use App\Models\LocationModel;

class Add extends Component
{

    public $id;
    public $name;
    public $type = 'offline';
    public $teacher_id = 1;
    public $location_id = 1;
    public $day = [];
    public $time_start;
    public $time_end;
    public $timezone = 'WIB';
    public $price;
    public $color;
    public $note;


    public function render()
    {
        $data['teachers'] = TeacherModel::all();
        $data['locations'] = LocationModel::all();
        return view('livewire.admin.class.add', $data);
    }

    public function storeClass()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required',
            'location_id' => 'required',
            'price' => 'required',
        ]);

        ClassModel::create([
            'name' => $this->name,
            'type' => $this->type,
            'teacher_id' => $this->teacher_id,
            'location_id' => $this->location_id,
            'day' => json_encode($this->day),
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'timezone' => $this->timezone,
            'price' => $this->price,
            'color' => $this->color,
            'note' => $this->note,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->flash('store', [
            'title' => 'Berhasil membuat Kelas',
        ]);
        return redirect()->route('admin-class');
    }
}
