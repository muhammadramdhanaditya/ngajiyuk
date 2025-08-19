<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Request;
use App\Models\EvaluationClassModel;

class AddEvaluation extends Component
{

    public $note_value = [
        'A' => 'Sangat Baik',
        'B' => 'Baik',
        'C' => 'Cukup Baik',
        'D' => 'Kurang Baik'
    ];

    public $evaluations = [];
    public $category_class_id;
    public $users_id;
    public $class_id;
    public $categories;

    public function mount()
    {
        if ($this->users_id !== null) {
            $this->users_id = $this->users_id;
        }
        if ($this->class_id !== null) {
            $this->class_id = $this->class_id;
        }
        if ($this->categories !== null) {
            $this->categories = $this->categories;
        }
    }

    public function render()
    {
        $data['categories'] = $this->categories;
        return view('livewire.admin.class.add-evaluation', $data);
    }

    public function storeEvaluationClass()
    {
        foreach ($this->evaluations as $categoryId => $evaluation) {
            EvaluationClassModel::create([
                'category_class_id' => $categoryId,
                'users_id' => $this->users_id,
                'value' => $evaluation['value'],
                'note_value' => $this->note_value[$evaluation['value']] ?? '',
                'note' => $evaluation['note'],
            ]);
        }
        session()->flash('store', [
            'title' => 'Berhasil membuat Evaluasi',
        ]);
        return redirect()->route('admin-class-user-evaluation', ['class_id' => $this->class_id, 'users_id' => $this->users_id]);
    }
}
