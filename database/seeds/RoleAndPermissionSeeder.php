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
        $showMember = Permission::create(['name'=>'show-members']);
        $updateMember = Permission::create(['name'=>'update-members']);
        $editMember = Permission::create(['name'=>'edit-members']);
        $showOrders = Permission::create(['name'=>'show-orders']);
        $addOrders = Permission::create(['name'=>'add-orders']);
        $updateOrders = Permission::create(['name'=>'update-orders']);
        $deleteOrders = Permission::create(['name'=>'delete-orders']);
        $addProducts = Permission::create(['name'=>'add-products']);
        $showProducts = Permission::create(['name'=>'show-products']);
        $deleteProducts = Permission::create(['name'=>'delete-products']);
        $updateProducts = Permission::create(['name'=>'update-products']);
        $spadmin = Role::create(['name'=>'super-admin']);
        $spadmin->syncPermissions(Permission::all());
        $user = Role::create(['name'=>'user']);
    }
}
