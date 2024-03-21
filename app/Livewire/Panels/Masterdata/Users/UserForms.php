<?php

namespace App\Livewire\Panels\Masterdata\Users;

use Livewire\Component;
use App\Models\User;
use App\Livewire\Forms\UserForm;
class UserForms extends Component
{
    public UserForm $form;
    public $id;
    public $rolesData = [];

    public function mount($id = null){
        if ($id) {
            $parsing = $this->form->view($id);
            $this->id = $parsing;
        }
        $this->rolesData = $this->form->attribute();
    }

    public function submitForm()
    {
        try {
            $this->form->submit($this->id);
            session()->flash('status', 'Data successfully saved.');
            return $this->redirectRoute('panel-config-users.index', navigate: true);
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.panels.masterdata.users.user-form');
    }
}
