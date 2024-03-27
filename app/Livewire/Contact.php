<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use Illuminate\View\View;
use Livewire\Component;

class Contact extends Component
{
    public ContactForm $form;

    public function render(): View
    {
        return view('livewire.contact');
    }

    public function send(): void
    {
        $this->form->save();
    }

}
