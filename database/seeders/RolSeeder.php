<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name'=>'Administrador']);
       $role2 = Role::create(['name'=>'Supervisor']);
       $role3 = Role::create(['name'=>'Usuario']);
       $role4 = Role::create(['name'=>'AdminMonalisa']);

       Permission::create(['name' => 'gantt'])->syncRoles([$role1,$role4]);
       Permission::create(['name' => 'responder.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'respuestas.index'])->syncRoles([$role1,$role2,$role4]);
       Permission::create(['name' => 'reportes.index'])->syncRoles([$role3]);
       Permission::create(['name' => 'tabla.index'])->syncRoles([$role1,$role4]);
       Permission::create(['name' => 'fecha.index'])->syncRoles([$role1,$role4]);
       Permission::create(['name' => 'areas.create'])->syncRoles([$role1,$role4]);
       Permission::create(['name' => 'categoria.create'])->syncRoles([$role1,$role4]);
       Permission::create(['name' => 'equipos.pilot'])->syncRoles([$role1]);
       Permission::create(['name' => 'equipos.monalisa'])->syncRoles([$role4]);
       Permission::create(['name' => 'tickets'])->syncRoles([$role1]);
       Permission::create(['name' => 'inventario.index'])->syncRoles([$role4]);
       Permission::create(['name' => 'subchecklist.index'])->syncRoles([$role1,$role4]);






    }
}
