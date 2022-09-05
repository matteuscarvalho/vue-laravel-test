<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::create(['name' => 'Administrador']);

        User::find(1)->assignRole($administrador);

        $comum = Role::create(['name' => 'Comum']);

        $comum = User::find(2)->assignRole($comum);

        $permisionModule = Permission::create(['name' => 'view permissions module']);
        $permisionList = Permission::create(['name' => 'view permissions list']);
        $permisionCreate = Permission::create(['name' => 'create permission']);
        $permisionEdit = Permission::create(['name' => 'edit permission']);
        $permisionDelete = Permission::create(['name' => 'delete permission']);

        $rolesModule = Permission::create(['name' => 'view roles module']);
        $rolesList = Permission::create(['name' => 'view roles list']);
        $rolesCreate = Permission::create(['name' => 'create role']);
        $rolesEdit = Permission::create(['name' => 'edit role']);
        $rolesDelete = Permission::create(['name' => 'delete role']);

        $usersModule = Permission::create(['name' => 'view users module']);
        $usersList = Permission::create(['name' => 'view user list']);
        $usersCreate = Permission::create(['name' => 'create user']);
        $usersEdit = Permission::create(['name' => 'edit user']);
        $usersDelete = Permission::create(['name' => 'delete user']);

        $categoriesModule = Permission::create(['name' => 'view categories module']);
        $categoriesList = Permission::create(['name' => 'view category list']);
        $categoriesCreate = Permission::create(['name' => 'create category']);
        $categoriesEdit = Permission::create(['name' => 'edit category']);
        $categoriesDelete = Permission::create(['name' => 'delete category']);

        $productsModule = Permission::create(['name' => 'view products module']);
        $productsList = Permission::create(['name' => 'view product list']);
        $productsCreate = Permission::create(['name' => 'create product']);
        $productsEdit = Permission::create(['name' => 'edit product']);
        $productsDelete = Permission::create(['name' => 'delete product']);

        $brandsModule = Permission::create(['name' => 'view brands module']);
        $brandsList = Permission::create(['name' => 'view brand list']);
        $brandsCreate = Permission::create(['name' => 'create brand']);
        $brandsEdit = Permission::create(['name' => 'edit brand']);
        $brandsDelete = Permission::create(['name' => 'delete brand']);

        $administrador->syncPermissions([
            $permisionModule,
            $permisionList,
            $permisionCreate,
            $permisionEdit,
            $permisionDelete,
            $rolesModule,
            $rolesList,
            $rolesCreate,
            $rolesEdit,
            $rolesDelete,
            $usersModule,
            $usersList,
            $usersCreate,
            $usersEdit,
            $usersDelete,
        ]);

        $comum->syncPermissions([
            $categoriesModule,
            $categoriesList,
            $categoriesCreate,
            $categoriesEdit,
            $categoriesDelete,
            $productsModule,
            $productsList,
            $productsCreate,
            $productsEdit,
            $productsDelete,
            $brandsModule,
            $brandsList,
            $brandsCreate,
            $brandsEdit,
            $brandsDelete,
        ]);
    }
}
