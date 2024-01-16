<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //Role List
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //User list
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            //Permission list
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            //Attendance List
            'attendance-list',
            'attendance-create',
            'attendance-edit',
            'attendance-delete',
            //Department List
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            //Package List
            'package-list',
            'package-create',
            'package-edit',
            'package-delete',
            //Category List
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            //Subcategory List
            'subcategory-list',
            'subcategory-create',
            'subcategory-edit',
            'subcategory-delete',
            //Product List
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            //Pages List
            'pages-list',
            'pages-create',
            'pages-edit',
            'pages-delete',
            //Shift List
            'shift-list',
            'shift-create',
            'shift-edit',
            'shift-delete',
            //Leaves List
            'leaves-list',
            'leaves-create',
            'leaves-edit',
            'leaves-delete',
            //Client List
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            //Project List
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
            //User Permission
            'user-permission',
            'change-password',
            'general_setting',
            //mail Inbox
            'mail-inbox',
         ];
      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $roles =[
            'Admin',
            'Company',
            'User',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }


        $user =[
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => date('Y-m-d h:i:s'),
        ];

        $userd = User::create($user);
        $userd->assignRole('Admin');


        // permission assign
        $rolepermission = 
        [
            ['permission_id' => 1,  'role_id' => 1],
            ['permission_id' => 2,  'role_id' => 1],
            ['permission_id' => 3,  'role_id' => 1],
            ['permission_id' => 4,  'role_id' => 1],
            ['permission_id' => 5,  'role_id' => 1],
            ['permission_id' => 6,  'role_id' => 1],
            ['permission_id' => 7,  'role_id' => 1],
            ['permission_id' => 8,  'role_id' => 1],
            ['permission_id' => 9,  'role_id' => 1],
            ['permission_id' => 10, 'role_id' => 1],
            ['permission_id' => 11, 'role_id' => 1],
            ['permission_id' => 12, 'role_id' => 1],
            ['permission_id' => 13, 'role_id' => 1],
            ['permission_id' => 14, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 1],
            ['permission_id' => 16, 'role_id' => 1],
            ['permission_id' => 17, 'role_id' => 1],
            ['permission_id' => 18, 'role_id' => 1],
            ['permission_id' => 19, 'role_id' => 1],
            ['permission_id' => 20, 'role_id' => 1],
            ['permission_id' => 21, 'role_id' => 1],
            ['permission_id' => 22, 'role_id' => 1],
            ['permission_id' => 23, 'role_id' => 1],
            ['permission_id' => 24, 'role_id' => 1],
            ['permission_id' => 25, 'role_id' => 1],
            ['permission_id' => 26, 'role_id' => 1],
            ['permission_id' => 27, 'role_id' => 1],
            ['permission_id' => 28, 'role_id' => 1],
            ['permission_id' => 29, 'role_id' => 1],
            ['permission_id' => 30, 'role_id' => 1],
            ['permission_id' => 31, 'role_id' => 1],
            ['permission_id' => 32, 'role_id' => 1],
            ['permission_id' => 33, 'role_id' => 1],
            ['permission_id' => 34, 'role_id' => 1],
            ['permission_id' => 35, 'role_id' => 1],
            ['permission_id' => 36, 'role_id' => 1],
            ['permission_id' => 37, 'role_id' => 1],
            ['permission_id' => 38, 'role_id' => 1],
            ['permission_id' => 39, 'role_id' => 1],
            ['permission_id' => 40, 'role_id' => 1],
            ['permission_id' => 41, 'role_id' => 1],
            ['permission_id' => 42, 'role_id' => 1],
            ['permission_id' => 43, 'role_id' => 1],
            ['permission_id' => 44, 'role_id' => 1],
            ['permission_id' => 45, 'role_id' => 1],
            ['permission_id' => 46, 'role_id' => 1],
            ['permission_id' => 47, 'role_id' => 1],
            ['permission_id' => 48, 'role_id' => 1],
            ['permission_id' => 49, 'role_id' => 1],
            ['permission_id' => 50, 'role_id' => 1],
            ['permission_id' => 51, 'role_id' => 1],
            ['permission_id' => 52, 'role_id' => 1],
            ['permission_id' => 53, 'role_id' => 1],
            ['permission_id' => 54, 'role_id' => 1],
            ['permission_id' => 55, 'role_id' => 1],
            ['permission_id' => 56, 'role_id' => 1],
            ['permission_id' => 57, 'role_id' => 1],
            ['permission_id' => 58, 'role_id' => 1],
            ['permission_id' => 59, 'role_id' => 1],
            ['permission_id' => 60, 'role_id' => 1],
            ['permission_id' => 61, 'role_id' => 1],
            ['permission_id' => 62, 'role_id' => 1],
        ];
        foreach($rolepermission as $role)
        {
            \DB::table('role_has_permissions')->insert($role);
        }
    }
}
