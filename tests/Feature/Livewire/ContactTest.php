<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Contact;
use App\Mail\ContactReceivedMail;
use App\Models\Contact as ContactModel;
use Illuminate\Support\Facades\Mail;
use function Pest\Livewire\livewire;

it('can render contact in home page', function () {

    $this->get('/')
        ->assertSeeLivewire(Contact::class);

});

it('can send email for contact', function () {

    // Arrange
    Mail::fake();

    $contact = ContactModel::factory()->make();

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'name' => $contact->name,
            'email' => $contact->email,
            'subject' => $contact->subject,
            'message' => $contact->message,
        ])
        ->call('send');

    // Assert
    $lw->assertMethodWiredToForm('send')
        ->assertHasNoErrors();

    expect($lw)
        ->assertPropertiesWired(['form.name', 'form.email', 'form.subject', 'form.message'])
        ->assertSetLivewireForm(['form.name' => null, 'form.email' => null, 'form.subject' => null, 'form.message' => null]);

    Mail::assertQueued(ContactReceivedMail::class, function ($mail) use ($contact) {
        return $mail->hasSubject($contact->subject)
            && $mail->hasFrom($contact->email)
            && $mail->hasTo(config('mail.from.address'));
    });

});

test('field name is required', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'name' => null,
        ])
        ->call('send');

    // Assert
    $lw
        ->assertHasErrors(['form.name' => 'required'])
        ->assertSeeHtml(__('validation.required', ['attribute' => 'nome']));

});

test('field name cannot has more than 255 characters', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'name' => str_repeat('a', 256),
        ])
        ->call('send');

    // Assert
    $lw->assertHasErrors(['form.name' => 'max'])
        ->assertSeeHtml(__('validation.max.string', ['attribute' => 'nome', 'max' => 255]));

});

test('field email is required', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'email' => null,
        ])
        ->call('send');

    // Assert
    $lw->assertHasErrors(['form.email' => 'required'])
        ->assertSeeHtml(__('validation.required', ['attribute' => 'e-mail']));

});

test('field email must be a valid email address', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'email' => 'invalid-email',
        ])
        ->call('send');

    // Assert
    $lw->assertHasErrors(['form.email' => 'email'])
        ->assertSeeHtml(__('validation.email', ['attribute' => 'e-mail']));

});

test('field email cannot has more than 255 characters', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'email' => str_repeat('a', 256) . fake()->email,
        ])
        ->call('send');

    // Assert
    $lw->assertHasErrors(['form.email' => 'max'])
        ->assertSeeHtml(__('validation.max.string', ['attribute' => 'e-mail', 'max' => 255]));

});

test('field subject is required', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'subject' => null,
        ])
        ->call('send');

    // Assert
    $lw
        ->assertHasErrors(['form.subject' => 'required'])
        ->assertSeeHtml(__('validation.required', ['attribute' => 'assunto']));

});

test('field subject cannot has more than 255 characters', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'subject' => str_repeat('a', 256),
        ])
        ->call('send');

    // Assert
    $lw->assertHasErrors(['form.subject' => 'max'])
        ->assertSeeHtml(__('validation.max.string', ['attribute' => 'assunto', 'max' => 255]));

});

test('field message is required', function () {

    // Act
    $lw = livewire(Contact::class)
        ->set('form', [
            'message' => null,
        ])
        ->call('send');

    // Assert
    $lw
        ->assertHasErrors(['form.message' => 'required'])
        ->assertSeeHtml(__('validation.required', ['attribute' => 'mensagem']));

});
