<?php

namespace App\Filament\Client\Pages\Auth;

use Filament\Facades\Filament;
use Filament\Pages\BasePage;
use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{

    // public function mount(): void
    // {
    //     if (Filament::auth()->check()) {
    //         redirect()->intended(Filament::getUrl());
    //     }
    // }

    protected static string $view = 'filament.client.pages.auth.login';
}
