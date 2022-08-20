<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Roles;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'nombres' => 'Cuauhtemoc',
            'apellidos' => 'Ramirez Prieto',
            'telefono' => '4561016284',
            'email' => 'admin@soul.com',
            'password' => bcrypt('12345678')
        ]);

        //$rol = Role::create(['name'=>'Administrador']);

        //$permisos = Permission::pluck('id','id') ->all();
        
        //$rol->syncPermissions($permisos);
    
        $usuario->assignRole('Administrador');
    }
}
