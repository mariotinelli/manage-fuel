<?php

namespace App\Livewire\Forms;

use App\Mail\ContactReceivedMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{

    #[Validate(
        rule: ['required', 'string', 'max:255'],
        attribute: 'nome'
    )]
    public ?string $name = null;

    #[Validate(
        rule: ['required', 'email', 'max:255'],
        attribute: 'e-mail'
    )]
    public ?string $email = null;

    #[Validate(
        rule: ['required', 'string', 'max:255'],
        attribute: 'assunto'
    )]
    public ?string $subject = null;

    #[Validate(
        rule: ['required', 'string', 'min:10', 'max:700'],
        attribute: 'mensagem'
    )]
    public ?string $message = null;

    public function save(): void
    {
        $data = $this->validate();

        Contact::query()->create($data);

        Mail::to(config('mail.from.address'))
            ->send(new ContactReceivedMail($data));

        $this->reset();
    }

}
