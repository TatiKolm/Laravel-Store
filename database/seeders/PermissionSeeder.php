<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("permissions")->insert([
            ['name' => 'products-create', 'guard_name' => 'web'],
            ['name' => 'products-edit', 'guard_name' => 'web'],
            ['name' => 'products-delete', 'guard_name' => 'web'],
            ['name' => 'products-show', 'guard_name' => 'web'],
            ['name' => 'users-create', 'guard_name' => 'web'],
            ['name' => 'users-edit', 'guard_name' => 'web'],
            ['name' => 'users-delete', 'guard_name' => 'web'],
            ['name' => 'users-show', 'guard_name' => 'web'],
            ['name' => 'trademarks-create', 'guard_name' => 'web'],
            ['name' => 'trademarks-edit', 'guard_name' => 'web'],
            ['name' => 'trademarks-delete', 'guard_name' => 'web'],
            ['name' => 'trademarks-show', 'guard_name' => 'web'],
        ]);

        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $user = Role::create(['name' => 'user']);

        $superAdmin->syncPermissions([
            'products-create',
            'products-edit',
            'products-delete',
            'products-show',
            'users-create',
            'users-edit',
            'users-delete',
            'users-show',
            'trademarks-create',
            'trademarks-edit',
            'trademarks-delete',
            'trademarks-show',
        ]);

        $admin->syncPermissions([
            'products-create',
            'products-edit',
            'products-delete',
            'products-show',
            'trademarks-create',
            'trademarks-edit',
            'trademarks-delete',
            'trademarks-show',
        ]);

        $moderator->syncPermissions([
            'products-create',
            'products-edit',
            'products-delete',
            'products-show',
            'trademarks-create',
            'trademarks-edit',
            'trademarks-delete',
            'trademarks-show',
        ]);
    }
}
