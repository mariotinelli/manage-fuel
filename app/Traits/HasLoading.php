<?php

namespace App\Traits;

trait HasLoading
{
    public function showLoading(): void
    {
        $this->dispatch('toggle-loading', ['loading' => true]);
    }

    public function hideLoading(): void
    {
        $this->dispatch('toggle-loading', ['loading' => false]);
    }
}
