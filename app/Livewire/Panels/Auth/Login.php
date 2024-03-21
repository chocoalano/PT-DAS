<?php

namespace App\Livewire\Panels\Auth;

use Livewire\Component;
use App\Livewire\Forms\LoginForm;

class Login extends Component
{
    public LoginForm $form; 

    public function submit() {
        $this->form->loginAction();
    }

    public function render()
    {
        return view('livewire.panels.auth.login');
    }
}
