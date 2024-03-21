<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserForm extends Form
{
    #[Validate('required|string')]
    public $name = '';
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required|min:6')]
    public $password = '';
    #[Validate('required|numeric')]
    public $roles = '';

    public function attribute(){
        return Role::all();
    }

    public function view($id){
        $q = User::find($id);
        $r = Role::all();
        if($q) {
            if (array_key_exists(0, $q->roles->pluck('name')->toArray())) {
                $rolename = $q->roles->pluck('name')->toArray()[0];
                $rolefind = Role::where('name', $rolename)->first();
                $this->roles    = $rolefind->id;
            }
            $this->name   = $q->name;
            $this->email    = $q->email;
            return $q->id;
        }
        session()->flash('error', 'Data not found!');
    }

    public function submit($id) 
    {
        $this->validate();
        $input = $this->all();
        if ($id) {
            $save = User::find($id);
            if (!$save) {
                session()->flash('error', 'Data not found!');
            }
        }else{
            $save = new User;
        }
        $save->name = $input['name'];
        $save->email = $input['email'];
        $save->password = $input['password'];
        $save->save();
        $findrole = Role::find($input['roles']);
        $save->assignRole([$findrole->id]);
    }
}
