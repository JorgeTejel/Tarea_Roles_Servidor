<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User ([
            'name' => 'administrador',
            'email' => 'a@a.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
        ]);
        $rol = Role::where('name', 'administrador')->first();
        $user->assignRole($rol);
        $user->saveOrFail();

        $user = new User ([
            'name' => 'gestor',
            'email' => 'g@g.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
        ]);
        $rol = Role::where('name', 'gestor')->first();
        $user->assignRole($rol);
        $user->saveOrFail();

        $user = new User ([
            'name' => 'comercial',
            'email' => 'c@c.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
        ]);
        $rol = Role::where('name', 'comercial')->first();
        $user->assignRole($rol);
        $user->saveOrFail();
    }
}
