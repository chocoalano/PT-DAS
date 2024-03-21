<?php

namespace App\Livewire\Panels\Masterdata\Permission;

use Livewire\Component;
use App\Livewire\Forms\PermissionForm;
class PermissionsForm extends Component
{
    public PermissionForm $form;
    public $id;
    public $attributeData = [];

    public function mount($id = null)
    {
        $this->id = $id;
        $this->attributeData = $this->form->attribute();
        if ($id) {
            $this->form->view($id);
        }
    }

    public function submit(){
        try {
            $this->form->submit($this->id);
            session()->flash('status', 'Data successfully saved.');
            return $this->redirectRoute('panel-config-permissions.index', navigate: true);
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.panels.masterdata.permission.permission-form');
    }
}
