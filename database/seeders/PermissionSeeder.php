<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [];

        $models = [
            'users',
            'suppliers',
            'categories',
            'units',
            'items',
        ];

        $methods = [
            '_store',
            '_update',
            '_delete',
            '_show',
            '_access'
        ];

        foreach ($models as $model) {
            foreach ($methods as $method) {
                $permissions[] = [
                    'title' => $model . $method
                ];
            }
        }

        Permission::insert($permissions);
        $permissions = Permission::all();
        Role::find(1)->permissions()->sync($permissions->pluck('id'));
    }
}
