<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\DB;

class RoleForm extends Form
{
    #[Validate('required|string|unique:roles')]
    public $name = '';
    #[Validate('required|string')]
    public $guard_name = 'web';
    #[Validate('array')]
    public $permission = [];

    public function attribute(){
        return PermissionGroup::with('permission')->get();
    }
    
    public function view($id){
        $q = Role::find($id);
        if($q) {
            $this->name   = $q->name;
            $this->guard_name    = $q->guard_name;
        }
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
          ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
          ->all();
        if ($rolePermissions) {
            $this->permission = $rolePermissions;
        }
    }

    public function submit($id) 
    {
        $this->validate();
        $input = $this->all();
        if ($id) {
            $save = Role::find($id);
        }else{
            $save = new Role;
        }
        $save->name = $input['name'];
        $save->guard_name = $input['guard_name'];
        $v = [];
        foreach ($input['permission'] as $k) {
            array_push($v, (int)$k);
        }
        $save->syncPermissions($v);
    }
}
