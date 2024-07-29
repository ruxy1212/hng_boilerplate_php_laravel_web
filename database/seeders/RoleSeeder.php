<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
          ["Guest", "Read-only access"],
          ["User", "Read, write, update"],
          ["Manager", "Read, write, approve"],
          ["Project Lead", "Manage, coordinate, oversee"],
          ["Administrator", "Full access, control"]
        ];

        foreach ($roles as $role) {
            $permission = Permission::firstOrCreate(['name' => $role[0], 'description' => $role[1]]);
            Role::getRandom()->permissions()->attach($permission->id);
        }
    }
}