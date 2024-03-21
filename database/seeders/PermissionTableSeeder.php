<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-access',
            'role-read&write',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-access',
            'permission-read&write',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'user-access',
            'user-read&write',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete'
         ];
         
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
