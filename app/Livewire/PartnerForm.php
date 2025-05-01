<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\SchoolPartnership;
use App\Enums\SchoolPartnershipEnums;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PartnerForm extends Component
{
    use LivewireAlert;

    public $company_name;
    public $responsible_name;
    public $responsible_phone;
    public $responsible_email;
    public $activity;

    protected $rules = [
        'company_name' => 'required',
        'responsible_name' => 'required',
        'responsible_email' => 'required|email|unique:school_partnerships',
        'responsible_phone' => 'required|unique:school_partnerships',
        'activity' => 'required',
    ];

    public function save()
    {
        $this->validate();

        SchoolPartnership::create([
            'company_name' => $this->company_name,
            'responsible_name' => $this->responsible_name,
            'responsible_phone' => $this->responsible_phone,
            'responsible_email' => $this->responsible_email,
            'activity' => $this->activity,
            'status' => SchoolPartnershipEnums::pending,
        ]);

        $this->reset();


        $this->alert('success', 'Partenaire créé avec succès.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => false,
        ]);
    }


    public function render()
    {
        return view('livewire.partner-form');
    }
}

