<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use App\Enums\ContactStatusEnums;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ContactForm extends Component
{
    use LivewireAlert;

    public $full_name;
    public $age;
    public $phone;
    public $message;
    public $objet;

    protected $rules = [
        'full_name' => 'required',
        'age' => 'required',
        'phone' => 'required|unique:contacts',
        'objet' => 'required',
        'message' => 'required',
    ];

    public function save()
    {
        $this->validate();

        Contact::create([
            'full_name' => $this->full_name,
            'age' => $this->age,
            'phone' => $this->phone,
            'message' => $this->message,
            'objet' => $this->objet,
            'status' => ContactStatusEnums::pending,
        ]);

        $this->full_name = '';
        $this->age = '';
        $this->phone = '';
        $this->message = '';
        $this->objet = '';

        $this->alert('success', 'Votre contact a été envoyé avec succès.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => false,
        ]);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
