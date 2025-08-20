<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;
use App\Models\UserModel;
use App\Models\EvaluationClassModel;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Evaluation extends Component
{
    public $evaluationId;
    public $showModal = false;
    public $value;
    public $note;
    public $categories = [];
    public $note_value = [
        'A' => 'Sangat Baik',
        'B' => 'Baik',
        'C' => 'Cukup Baik',
        'D' => 'Kurang Baik'
    ];


    public $users_id;
    public $class_id;
    public $category_class;
    public $evaluations;

    protected $listeners = ['openEditModal' => 'openModal'];

    public function openModal($evaluationId)
    {
        $this->evaluationId = $evaluationId;
        $evaluation = EvaluationClassModel::with(['categoryClass.class', 'categoryClass.category'])
            ->findOrFail($evaluationId);

        $this->value = $evaluation->value;
        $this->note = $evaluation->note;

        $this->showModal = true;
        $this->dispatch('showModal');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['value', 'note_value', 'note', 'evaluationId']);
        $this->dispatch('hideModal');
    }

    public function updateEvaluation()
    {
        $this->validate([
            'value' => 'required|in:A,B,C,D',
            'note' => 'nullable|string|max:500'
        ]);
        $dataEvaluation = [
            'value' => $this->value,
            'note_value' => $this->note_value[$this->value] ?? '',
            'note' => $this->note
        ];
        EvaluationClassModel::where('id', $this->evaluationId)->update($dataEvaluation);
        $this->closeModal();
        $this->dispatch('evaluationUpdated');
        session()->flash('store', [
            'title' => 'Berhasil mengubah hasil Evaluasi',
        ]);
        return redirect()->route('admin-class-user-evaluation', ['class_id' => $this->class_id, 'users_id' => $this->users_id]);
    }

    public function updatedValue($value)
    {
        $this->note_value = $this->scoreDescriptions[$value] ?? '';
    }

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
        $data['users'] = UserModel::find($this->users_id);
        return view('livewire.admin.class.evaluation', $data);
    }
}
