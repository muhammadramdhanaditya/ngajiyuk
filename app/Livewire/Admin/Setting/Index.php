<?php

namespace App\Livewire\Admin\Setting;

use Livewire\Component;
use App\Models\SettingModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Index extends Component
{


    use WithFileUploads;

    public $id, $title_home, $note_home, $qr_code_url, $name, $name_bank, $number_bank, $qr_code;

    public $settings;

    public function mount()
    {
        if ($this->settings !== null) {
            $this->id = $this->settings->id;
            $this->title_home = $this->settings->title_home;
            $this->note_home = $this->settings->note_home;
            $this->qr_code_url = $this->settings->qr_code_url;
            $this->name = $this->settings->name;
            $this->name_bank = $this->settings->name_bank;
            $this->number_bank = $this->settings->number_bank;
        }
    }

    public function render()
    {
        return view('livewire.admin.setting.index');
    }

    public function storeSetting()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'qr_code' => 'nullable|image|max:5000',
        ]);

        $data = [
            'title_home' => $this->title_home,
            'note_home' => $this->note_home,
            'qr_code_url' => $this->qr_code_url,
            'name' => $this->name,
            'name_bank' => $this->name_bank,
            'number_bank' => $this->number_bank,
        ];

        if ($this->qr_code) {
            if ($this->qr_code_url) {
                Storage::delete(str_replace('/storage', 'public', $this->qr_code_url));
            }
            $path = $this->qr_code->store('public/qr_code');
            $data['qr_code_url'] = Storage::url($path);
            $this->qr_code_url = $data['qr_code_url'];
        }

        SettingModel::where('id', $this->id)->update($data);

        LivewireAlert::title('Berhasil Update Setting')
            ->toast()
            ->position('top-end')
            ->success()
            ->show();
    }
}
