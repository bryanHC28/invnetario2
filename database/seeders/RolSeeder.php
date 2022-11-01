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
       $role1 = Role::create(['name'=>'Admin']);
       $role2 = Role::create(['name'=>'Supervisor']);

       Permission::create(['name' => 'tabla.index'])->assignRole($role1);
       Permission::create(['name' => 'tabla.create'])->assignRole($role1);

       Permission::create(['name' => 'equipo.create'])->assignRole($role1);
       Permission::create(['name' => 'equipo.edit'])->assignRole($role1);
       Permission::create(['name' => 'equipo.destroy'])->assignRole($role1);

       Permission::create(['name' => 'areas.create'])->assignRole($role1);

       Permission::create(['name' => 'categoria.create'])->assignRole($role1);

       Permission::create(['name' => 'checklist.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'checklist.create'])->syncRoles([$role1,$role2]);

       Permission::create(['name' => 'preguntas.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'preguntas.update'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'preguntas.destroy'])->assignRole($role1);

       Permission::create(['name' => 'vista_checklist.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'vista_checklist.combo_categoria'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'vista_checklist.llenar_tabla_filtro'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'vista_checklist.llenar_tabla_contestar'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'vista_checklist.llenar_formulario'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'vista_checklist.llenar_tabla_preguntas'])->syncRoles([$role1,$role2]);

    }
}
