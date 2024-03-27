<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;

class Subscribe extends Component
{
    public function render(): View
    {
        return view('livewire.subscribe');
    }

    public function mount(): RedirectResponse|Redirector
    {
        return auth()->user()
            ->newSubscription('default', 'price_1OxEhV2MPL7xqEuPk44jh5sK')
            ->checkout()
            ->redirect();
    }
}
