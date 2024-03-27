<?php

namespace App\Livewire\Forms;

use App\Mail\SubscribedNewsletterMail;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NewsletterForm extends Form
{
    #[Validate(
        rule: ['required', 'string', 'max:255'],
        attribute: 'nome'
    )]
    public ?string $name = null;

    #[Validate(
        rule: ['required', 'email', 'max:255', 'unique:newsletters,email'],
        attribute: 'e-mail'
    )]
    public ?string $email = null;

    public function save(): void
    {
        $data = $this->validate();

        Newsletter::query()->create($data);

        Mail::to($data['email'])->send(new SubscribedNewsletterMail());

        $this->reset();
    }

}
