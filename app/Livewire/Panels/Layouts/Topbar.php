<?php

namespace App\Livewire\Panels\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Topbar extends Component
{
    public $auth;

    public function mount()
    {
        $this->auth = Auth::user();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('panel-login');
    }

    public function render()
    {
        return view('livewire.panels.layouts.topbar');
    }
}
