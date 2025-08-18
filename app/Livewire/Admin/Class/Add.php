<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use App\Models\CategoryModel;
use App\Models\LocationModel;
use App\Models\CategoryClassModel;
use Illuminate\Support\Facades\DB;

class Add extends Component
{

    public $id;
    public $name;
    public $type = 'offline';
    public $teacher_id = 1;
    public $location_id = 1;
    public $category_id = [''];
    public $day = [];
    public $time_start;
    public $time_end;
    public $timezone = 'WIB';
    public $price;
    public $color = "#0d6efd";
    public $note;

    public function mount()
    {
        $this->category_id = [''];
    }

    public function render()
    {
        $data['teachers'] = TeacherModel::all();
        $data['locations'] = LocationModel::all();
        $data['categories'] = CategoryModel::all();
        return view('livewire.admin.class.add', $data);
    }

    public function addCategory()
    {
        $this->category_id[] = '';
    }

    public function removeCategory($index)
    {
        unset($this->category_id[$index]);
        $this->category_id = array_values($this->category_id);
    }

    public function storeClass()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required',
            'location_id' => 'required',
            'price' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $class = ClassModel::create([
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
            ]);

            foreach ($this->category_id as $categoryId) {
                CategoryClassModel::create([
                    'class_id' => $class->id,
                    'category_id' => $categoryId
                ]);
            }

            DB::commit();
            session()->flash('store', [
                'title' => 'Berhasil membuat Kelas',
            ]);
            return redirect()->route('admin-class');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return;
        }
    }
}
