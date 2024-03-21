<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionGroup;
use Livewire\Form;

class PermissionForm extends Form
{
    #[Validate('required|string')]
    public $name = '';
 
    #[Validate('required|string')]
    public $guard_name = 'web';

    #[Validate('array')]
    public $actions = [];

    public function attribute(){
        return [
            [
                'thead'=>['Access', 'Read & Write'],
                'tbody'=>['access', 'read&write']
            ],
            [
                'thead'=>['List', 'Create'],
                'tbody'=>['list', 'create']
            ],
            [
                'thead'=>['Update', 'Delete'],
                'tbody'=>['update', 'delete']
            ],
            [
                'thead'=>['Export', 'Import'],
                'tbody'=>['export', 'import']
            ]
        ];
    }

    public function view($id){
        $q = PermissionGroup::with('permission')->find($id);
        if ($q) {
            $arr = [];
            foreach ($q->permission as $k) {
                array_push($arr, explode("-", $k->name)[1]);
            }
            $this->name = $q->name;
            $this->guard_name = 'web';
            $this->actions = $arr;
        }
    }

    public function submit($id) 
    {
        $this->validate();
        $input = $this->all();
        $prm = [];
        foreach ($this->actions as $k) {
            $name = strtolower($input['name']).'-'.$k;
            $cek = Permission::where('name', 'like', '%'.$name.'%')->count();
            if ($cek < 1) {
                array_push($prm, [
                    'name'=>$name,
                    'guard_name'=>$input['guard_name']
                ]);
            }
        }
        if (count($prm) < 1) {
            session()->flash('error', 'Data permission is unique value!');
        }else{
            if ($id) {
                $save = PermissionGroup::find($this->id);
                $save->name = strtolower($this->name);
                $save->save();
                if (count($prm) > 0) {
                    Permission::where('permission_group_id', $this->id)->delete();
                    $save->permission()->createMany($prm);
                }
            }else{
                $save = new PermissionGroup;
                $save->name = strtolower($this->name);
                $save->save();
                $save->permission()->createMany($prm);
            }
        }
    }
}
