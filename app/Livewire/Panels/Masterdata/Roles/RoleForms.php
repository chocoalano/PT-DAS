<?php

namespace App\Livewire\Panels\Masterdata\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\RoleForm;

class RoleForms extends Component
{
    public RoleForm $form;
    public $id;
    public $permissionData = [];
    public $permission = [];

    public function mount($id = null)
    {
        if ($id) {
            $parsing = $this->form->view($id);
            $this->id = $parsing;
            $this->permission=$this->form->permission;
        }
        $this->permissionData = $this->form->attribute();
    }

    public function submit(){
        try {
            $this->form->submit($this->id);
            session()->flash('status', 'Data successfully saved.');
            return $this->redirectRoute('panel-config-roles.index', navigate: true);
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.panels.masterdata.roles.role-form');
    }
}
