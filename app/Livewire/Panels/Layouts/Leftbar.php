<?php

namespace App\Livewire\Panels\Layouts;

use Livewire\Component;

class Leftbar extends Component
{
    public $menu = [];
    public function mount()
    {
        $this->menu = [
            [
                'groupname'=>'Navigation',
                'data'=>[
                    [
                        'nama'=>'Home',
                        'url'=>route('panel-home'),
                        'icon'=>'uil-home-alt',
                        'permission'=>[],
                    ],
                    [
                        'nama'=>'Users',
                        'url'=>route('panel-config-users.index'),
                        'icon'=>'uil-users-alt',
                        'permission'=>['user-access'],
                    ],
                    [
                        'nama'=>'Roles',
                        'url'=>route('panel-config-roles.index'),
                        'icon'=>'uil-layer-group',
                        'permission'=>['role-access'],
                    ],
                    [
                        'nama'=>'Permissions',
                        'url'=>route('panel-config-permissions.index'),
                        'icon'=>'uil-lock-access',
                        'permission'=>['permission-access'],
                    ],
                ]
            ],
            [
                'groupname'=>'Apps',
                'data'=>[
                    [
                        'nama'=>'Blogs',
                        'url'=>route('panel-blogs'),
                        'icon'=>'uil-book-open',
                        'permission'=>[],
                        'child'=>[]
                    ],
                    [
                        'nama'=>'Projects',
                        'url'=>route('panel-projects'),
                        'icon'=>'uil-briefcase',
                        'permission'=>[],
                        'child'=>[]
                    ],
                ]
            ]
        ];
    }
    public function render()
    {
        return view('livewire.panels.layouts.leftbar');
    }
}
