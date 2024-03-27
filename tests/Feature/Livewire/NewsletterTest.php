<?php

namespace Tests\Feature\Livewire;

use App\Livewire\{Newsletter};
use App\Mail\SubscribedNewsletterMail;
use App\Models\Newsletter as NewsletterModel;
use Illuminate\Support\Facades\Mail;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

it('can render newsletter in home page', function () {

    $this->get('/')
        ->assertSeeLivewire(Newsletter::class);

});

it('can subscribes to the newsletter', function () {

    // Arrange
    Mail::fake();

    $newsletter = NewsletterModel::factory()->make();

    // Act
    $lw = livewire(Newsletter::class)
        ->set('form', [
            'name' => $newsletter->name,
            'email' => $newsletter->email,
        ])
        ->call('subscribe');

    // Assert
    $lw->assertMethodWiredToForm('subscribe')
        ->assertHasNoErrors();

    expect($lw)
        ->assertPropertiesWired(['form.name', 'form.email'])
        ->assertSetLivewireForm(['form.name' => null, 'form.email' => null]);

    assertDatabaseHas('newsletters', [
        'name' => $newsletter->name,
        'email' => $newsletter->email,
    ]);

    Mail::assertQueued(SubscribedNewsletterMail::class, function ($mail) use ($newsletter) {
        return $mail->hasTo($newsletter->email);
    });

});

it('can subscribe only one time', function () {

    // Arrange
    $newsletter = NewsletterModel::factory()->create();

    // Act
    $lw = livewire(Newsletter::class)
        ->set('form', [
            'name' => $newsletter->name,
            'email' => $newsletter->email,
        ])
        ->call('subscribe');

    // Assert
    $lw
        ->assertHasErrors(['form.email' => 'unique'])
        ->assertSeeHtml(__('validation.unique', ['attribute' => 'e-mail']));

});

test('field name is required', function () {

    // Act
    $lw = livewire(Newsletter::class)
        ->set('form', [
            'name' => null,
        ])
        ->call('subscribe');

    // Assert
    $lw
        ->assertHasErrors(['form.name' => 'required'])
        ->assertSeeHtml(__('validation.required', ['attribute' => 'nome']));

});

test('field name cannot has more than 255 characters', function () {

    // Act
    $lw = livewire(Newsletter::class)
        ->set('form', [
            'name' => str_repeat('a', 256),
        ])
        ->call('subscribe');

    // Assert
    $lw->assertHasErrors(['form.name' => 'max'])
        ->assertSeeHtml(__('validation.max.string', ['attribute' => 'nome', 'max' => 255]));

});

test('field email is required', function () {

    // Act
    $lw = livewire(Newsletter::class)
        ->set('form', [
            'email' => null,
        ])
        ->call('subscribe');

    // Assert
    $lw->assertHasErrors(['form.email' => 'required'])
        ->assertSeeHtml(__('validation.required', ['attribute' => 'e-mail']));

});

test('field email must be a valid email address', function () {

    // Act
    $lw = livewire(Newsletter::class)
        ->set('form', [
            'email' => 'invalid-email',
        ])
        ->call('subscribe');

    // Assert
    $lw->assertHasErrors(['form.email' => 'email'])
        ->assertSeeHtml(__('validation.email', ['attribute' => 'e-mail']));

});

test('field email cannot has more than 255 characters', function () {

    // Act
    $lw = livewire(Newsletter::class)
        ->set('form', [
            'email' => str_repeat('a', 256) . fake()->email,
        ])
        ->call('subscribe');

    // Assert
    $lw->assertHasErrors(['form.email' => 'max'])
        ->assertSeeHtml(__('validation.max.string', ['attribute' => 'e-mail', 'max' => 255]));

});
