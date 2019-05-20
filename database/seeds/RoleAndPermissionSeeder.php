<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Permission::create(['name'=>'setting']);
        $addMember = Permission::create(['name'=>'add-members']);
        $readMember = Permission::create(['name'=>'read-members']);
        $updateMember = Permission::create(['name'=>'update-members']);
        $deleteMember = Permission::create(['name'=>'delete-members']);
        $readOrders = Permission::create(['name'=>'read-orders']);
        $addOrders = Permission::create(['name'=>'add-orders']);
        $updateOrders = Permission::create(['name'=>'update-orders']);
        $deleteOrders = Permission::create(['name'=>'delete-orders']);
        $addProducts = Permission::create(['name'=>'add-products']);
        $readProducts = Permission::create(['name'=>'read-products']);
        $deleteProducts = Permission::create(['name'=>'delete-products']);
        $updateProducts = Permission::create(['name'=>'update-products']);
        $spadmin = Role::create(['name'=>'super-admin']);
        $spadmin->syncPermissions(Permission::all());
        $user = Role::create(['name'=>'user']);
    }
}
