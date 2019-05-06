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
        $setting = Permission::create(['name'=>'manage setting']);
        $member = Permission::create(['name'=>'manage members']);
        $orders = Permission::create(['name'=>'manage orders']);
        $products = Permission::create(['name'=>'manage products']);
        $spadmin = Role::create(['name'=>'super-admin']);
        $admin = Role::create(['name'=>'admin']);
        $seller = Role::create(['name'=>'seller']);
        $spadmin->syncPermissions(Permission::all());
        $admin->syncPermissions($orders,$products);
        $seller->givePermissionTo($orders);
        $user = Role::create(['name'=>'user']);
    }
}
