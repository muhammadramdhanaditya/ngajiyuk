<?php

namespace App\Livewire\Schedule;

use Livewire\Component;
use App\Models\ClassModel;
use App\Models\SettingModel;
use Livewire\WithFileUploads;
use App\Models\UserClassModel;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Index extends Component
{

    use WithFileUploads;

    public $selectedClass;
    public $bukti_transfer;

    public function mount()
    {
        if (session()->has('store')) {
            LivewireAlert::title(session('store.title'))->text(session('store.text'))
                ->toast()
                ->position('top-end')
                ->success()
                ->show();
        }
    }

    public function showClassDetail($classId)
    {
        $this->selectedClass = ClassModel::with(['teacher', 'location'])->find($classId);
    }

    public function render()
    {
        $data['classes'] = ClassModel::with(['teacher', 'location'])->get();
        $data['settings'] = SettingModel::first();
        return view('livewire.schedule.index', $data);
    }

    public function registerClass($classId)
    {
        if (!auth()->check()) {

            session()->flash('store', [
                'title' => 'Anda Harus Login Dulu',
                'text' => 'Jika ingin daftar kelas',
            ]);
            redirect()->route('login');
        }

        $this->selectedClass = ClassModel::find($classId);
    }

    public function submitPayment()
    {
        $this->validate([
            'bukti_transfer' => 'required|image|max:5120',
        ]);

        $path = $this->bukti_transfer->store('public/bukti_transfer');
        $users = Auth::user();


        $transaction = TransactionModel::create([
            'users_id' => $users->id,
            'class_id' => $this->selectedClass->id,
            'bukti_transfer_url' => Storage::url($path),
            'is_accepted' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        UserClassModel::create([
            'users_id' => $users->id,
            'class_id' => $this->selectedClass->id,
            'transaction_id' => $transaction->id,
            'visibility' => 'off',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        session()->flash('store', [
            'title' => 'Bukti pembayaran berhasil dikirim.',
            'text' => 'Admin akan memverifikasi dalam 1x24 jam.',
        ]);
        redirect()->route('schedule');
    }
}
