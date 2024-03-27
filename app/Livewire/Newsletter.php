<?php

namespace App\Livewire;

use App\Livewire\Forms\NewsletterForm;
use Illuminate\View\View;
use Livewire\Component;

class Newsletter extends Component
{
    public NewsletterForm $form;

    public function render(): View
    {
        return view('livewire.newsletter');
    }

    public function subscribe(): void
    {
        $this->form->save();
    }
}
