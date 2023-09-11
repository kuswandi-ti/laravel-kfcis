<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** Reset Cached Roles and Permissions */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /** Create Permission */
        $permissions = getArrayAllPermission();
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        /** Create Role */
        $role_super_admin = Role::create([
            'guard_name' => 'web',
            'name' => 'Super Admin',
        ]);

        $role_ketua = Role::create([
            'guard_name' => 'web',
            'name' => 'Ketua',
        ]);
        $role_ketua->givePermissionTo(setArrayRoleKetuaPermission());

        $role_bendahara = Role::create([
            'guard_name' => 'web',
            'name' => 'Bendahara',
        ]);
        $role_bendahara->givePermissionTo(setArrayRoleBendaharaPermission());

        $role_sekretaris = Role::create([
            'guard_name' => 'web',
            'name' => 'Sekretaris',
        ]);
        $role_sekretaris->givePermissionTo(setArrayRoleSekretarisPermission());

        /** Create User */
        $user_super_admin = User::create([
            'name' => 'Super Admin',
            'slug' => Str::slug('Super Admin'),
            'email' => 'superadmin@mail.com',
            'email_verified_at' => saveDateTimeNow(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.no_image'),
            'approved_at' => saveDateTimeNow(),
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        $user_ketua = User::create([
            'name' => 'Ketua',
            'slug' => Str::slug('Ketua'),
            'email' => 'ketua@mail.com',
            'email_verified_at' => saveDateTimeNow(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.no_image'),
            'approved_at' => saveDateTimeNow(),
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        $user_bendahara = User::create([
            'name' => 'Bendahara',
            'slug' => Str::slug('Bendahara'),
            'email' => 'bendahara@mail.com',
            'email_verified_at' => saveDateTimeNow(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.no_image'),
            'approved_at' => saveDateTimeNow(),
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        $user_sekretaris = User::create([
            'name' => 'Sekretaris',
            'slug' => Str::slug('Sekretaris'),
            'email' => 'sekretaris@mail.com',
            'email_verified_at' => saveDateTimeNow(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.no_image'),
            'approved_at' => saveDateTimeNow(),
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        /** Assign Role to User */
        $user_super_admin->assignRole($role_super_admin);
        $user_ketua->assignRole($role_ketua);
        $user_bendahara->assignRole($role_bendahara);
        $user_sekretaris->assignRole($role_sekretaris);
    }
}
