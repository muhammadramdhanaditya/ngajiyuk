<?php

namespace App\Livewire\Admin\Transaction;

use Livewire\Component;
use App\Models\TransactionModel;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Index extends Component
{
    public function render()
    {
        $data['transactions'] = TransactionModel::orderBy('id', 'desc')->get();
        return view('livewire.admin.transaction.index', $data);
    }

    public function accClass($id)
    {
        $transaction = TransactionModel::find($id);
        $transaction->update([
            'is_accepted' => 1,
        ]);

        LivewireAlert::title('Kelas Peserta telah di terima')
            ->toast()
            ->position('top-end')
            ->success()
            ->show();
    }

    public function cancelClass($id)
    {
        $transaction = TransactionModel::find($id);
        $transaction->update([
            'is_accepted' => 2,
        ]);

        LivewireAlert::title('Kelas Peserta telah berhenti')
            ->toast()
            ->position('top-end')
            ->success()
            ->show();
    }
}
