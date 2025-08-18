<?php

namespace App\Livewire\Admin\Class;

use Livewire\Component;
use App\Models\CategoryModel;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Category extends Component
{

    public $name;
    public $categoryId;
    public $editMode = false;

    protected $rules = [
        'name' => 'required|min:3|max:255'
    ];

    public function mount()
    {
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
        $data['categories'] = CategoryModel::all();
        return view('livewire.admin.class.category', $data);
    }

    public function showModal()
    {
        $this->resetForm();
        $this->dispatch('show-category-modal');
    }

    public function add()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->dispatch('show-category-modal');
    }

    public function storeCategory()
    {
        $this->validate();

        CategoryModel::create([
            'name' => $this->name
        ]);

        $this->resetForm();
        $this->dispatch('hide-category-modal');
        session()->flash('store', [
            'title' => 'Berhasil Menambahkan Kategori Kelas',
        ]);
        return $this->redirect(route('admin-class-category'));
    }

    public function edit($id)
    {
        $category = CategoryModel::findOrFail($id);
        $this->categoryId = $id;
        $this->name = $category->name;
        $this->editMode = true;
        $this->dispatch('show-category-modal');
    }

    public function updateCategory()
    {
        $this->validate();

        $category = CategoryModel::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->name
        ]);

        $this->resetForm();
        $this->dispatch('hide-category-modal');
        session()->flash('store', [
            'title' => 'Berhasil Mengupdate Kategori Kelas',
        ]);
        return $this->redirect(route('admin-class-category'));
    }

    public function resetForm()
    {
        $this->name = '';
        $this->categoryId = null;
        $this->editMode = false;
        $this->resetErrorBag();
    }

    public function destroy($id)
    {
        CategoryModel::destroy($id);
        session()->flash('store', [
            'title' => 'Berhasil Menghapus Kategori Kelas',
        ]);
        return $this->redirect(route('admin-class-category'));
    }
}
