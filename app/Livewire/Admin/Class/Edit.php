<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use App\Models\CategoryModel;
use App\Models\LocationModel;
use App\Models\CategoryClassModel;
use Illuminate\Support\Facades\DB;

class Edit extends Component
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
    public $color;
    public $note;

    public $classes;
    public $selectedCategories;

    public function mount()
    {
        if ($this->classes !== null) {
            $this->id = $this->classes->id;
            $this->name = $this->classes->name;
            $this->type = $this->classes->type;
            $this->teacher_id = $this->classes->teacher_id;
            $this->location_id = $this->classes->location_id;
            $this->day = json_decode($this->classes->day);
            $this->time_start = $this->classes->time_start;
            $this->time_end = $this->classes->time_end;
            $this->timezone = $this->classes->timezone;
            $this->price = $this->classes->price;
            $this->color = $this->classes->color;
            $this->note = $this->classes->note;
        }
        if ($this->selectedCategories !== null) {
            $this->category_id = $this->selectedCategories->pluck('category_id')->toArray();
        }
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

    public function storeEditClass()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required',
            'location_id' => 'required',
            'price' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $data = [
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
            ];

            ClassModel::where('id', $this->id)->update($data);

            CategoryClassModel::where('class_id', $this->id)->delete();
            foreach ($this->category_id as $categoryId) {
                CategoryClassModel::create([
                    'class_id' => $this->id,
                    'category_id' => $categoryId
                ]);
            }
            DB::commit();

            session()->flash('store', [
                'title' => 'Berhasil mengedit Kelas',
            ]);
            return redirect()->route('admin-class');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return;
        }
    }
    public function render()
    {
        $data['teachers'] = TeacherModel::all();
        $data['locations'] = LocationModel::all();
        $data['categories'] = CategoryModel::all();
        return view('livewire.admin.class.edit', $data);
    }
}
