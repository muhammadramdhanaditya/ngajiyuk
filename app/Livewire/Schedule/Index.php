<?php

namespace App\Livewire\Schedule;

use Livewire\Component;
use App\Models\ClassModel;
use App\Models\SettingModel;
use Livewire\WithFileUploads;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{

    use WithFileUploads;

    public $selectedClass;
    public $paymentProof;

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
                'text' => 'jika ingin daftar kelas',
            ]);
            redirect()->route('login');
        }

        $this->selectedClass = ClassModel::find($classId);
    }

    public function submitPayment()
    {
        $this->validate([
            'paymentProof' => 'required|image|max:5120',
        ]);

        $path = $this->paymentProof->store('public/bukti_transfer');

        TransactionModel::create([
            'class_id' => $this->selectedClass->id,
            'bukti_pembayaran_url' => Storage::url($path),
            'is_accepted' => 0
        ]);


        session()->flash('store', [
            'title' => 'Bukti pembayaran berhasil dikirim.',
            'text' => 'Admin akan memverifikasi dalam 1x24 jam.',
        ]);
        redirect()->route('schedule');
    }
}
