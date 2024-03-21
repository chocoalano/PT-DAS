<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expense;
use App\Models\User;
use App\Models\PermissionGroup;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissionGroup = ['role', 'permission', 'user'];
        foreach ($permissionGroup as $permissionGroups) {
            $prmGrp = new PermissionGroup();
            $prmGrp->name = $permissionGroups;
            $prmGrp->save();
            $prm = [];
            $act = ['access', 'read&write', 'list', 'create', 'update', 'delete', 'export', 'import'];
            foreach ($act as $acts) {
                array_push($prm, [
                    'name'=>$permissionGroups.'-'.$acts,
                    'guard_name'=>'web'
                ]);
            }
            $prmGrp->permission()->createMany($prm);
        }
         
        User::factory(100)->create();

        $user= User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $role = Role::create(['name' => 'Superadmin']);
         
        $permissions = Permission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
         
        $user->assignRole([$role->id]);
    }
}
