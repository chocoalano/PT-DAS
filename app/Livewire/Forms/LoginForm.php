<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|email')]
    public $email = '';
 
    #[Validate('required|min:5')]
    public $password = '';

    public function loginAction() 
    {
        $this->validate();
        try {
            $input = $this->all();
            $login = Auth::attempt($input);
            if ($login) {
                return redirect()->route('panel-home');
            } else {
                session()->flash('error', 'Unauthorized Credential!');
            }
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
    }
}
