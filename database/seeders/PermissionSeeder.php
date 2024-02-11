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
            'vendors',
            'categories',
            'units',
            'items',
            'purchase_orders',
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

        $permissions[] = [
            'title' => 'dashboard_access'
        ];

        $permissions[] = [
            'title' => 'inventory_management'
        ];

        $permissions[] = [
            'title' => 'user_management'
        ];

        Permission::insert($permissions);
        $permissions = Permission::all();
        Role::find(1)->permissions()->sync($permissions->pluck('id'));
        Role::find(2)->permissions()->sync($permissions->pluck('id'));
        Role::find(3)->permissions()->sync($permissions->pluck('id'));
    }
}
