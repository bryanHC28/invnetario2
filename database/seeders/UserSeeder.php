<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Empresa;
use App\Models\categoriachecklist;
use App\Models\checklist;
use App\Models\Sucursal;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Empresa::create([
            'nombre_empresa' => 'pilot',
            'Estado_eliminado' => 1
        ]);

        Empresa::create([
            'nombre_empresa' => 'Monalisa',
            'Estado_eliminado' => 1
        ]);



        Sucursal::create([
            'id_empresa' => 1,
            'nombre_sucursal' => 'pilot_chemical',
            'Estado_eliminado' => 1
        ]);

        Sucursal::create([
            'id_empresa' => 2,
            'nombre_sucursal' => 'Cabos Monalisa',
            'Estado_eliminado' => 1
        ]);

        categoriachecklist::create([

            'nombre' => 'REACTORES',
            'Estado_eliminado' => 1,
            'id_sucursal' => 1
        ]);

        categoriachecklist::create([

            'nombre' => 'BOMBAS',
            'Estado_eliminado' => 1,
            'id_sucursal' => 1
        ]);




        Checklist::create([

            'id_categoriachecklist' => 1,
            'nombre' => 'ACTIVIDAD MECANICA CADA 5 AÑOS A REACTOR',
            'Estado_eliminado' => 1
        ]);


        Checklist::create([

            'id_categoriachecklist' => 1,
            'nombre' => 'ACTIVIDADES MECANICAS ANUALES A  REDUCTOR',
            'Estado_eliminado' => 1
        ]);


        Checklist::create([

            'id_categoriachecklist' => 1,
            'nombre' => 'ACTIVIDADES TRIMESTRAL A REDUCTOR',
            'Estado_eliminado' => 1
        ]);


        Checklist::create([

            'id_categoriachecklist' => 1,
            'nombre' => 'ACTIVIDADES MECANICAS MENSUAL A BOMBA REDUCTOR',
            'Estado_eliminado' => 1
        ]);


        Checklist::create([

            'id_categoriachecklist' => 2,
            'nombre' => 'ACTIVIDADES TRIMESTRAL A BOMBA CENTRIFUGA',
            'Estado_eliminado' => 1
        ]);


        Checklist::create([

            'id_categoriachecklist' => 2,
            'nombre' => 'ACTIVIDADES MECANICAS MENSUAL A BOMBA CENTRIFUGA',
            'Estado_eliminado' => 1
        ]);


        Checklist::create([

            'id_categoriachecklist' => 1,
            'nombre' => 'ACTIVIDAD MECANICA CADA 3 AÑOS AL SELLO MECANICO',
            'Estado_eliminado' => 1
        ]);








        User::create([
            'name'=> 'Bryan Hilario Carrasco',
            'email'=> 'bryyan28@hotmail.com',
            'password'=> bcrypt('12345678'),
            'id_empresa'=>1,
            'id_sucursal'=>1,
            'Estado_eliminado'=>1



        ])->assignRole('Administrador');


        User::create([
            'name'=> 'OLIVARES MUÑOZ ARTURO',
            'email'=> 'aom@organosintesis.com',
            'password'=> bcrypt('aom.2022'),
            'id_empresa'=>1,
            'id_sucursal'=>1,
            'Estado_eliminado'=>1

        ])->assignRole('Administrador');


        User::create([
            'name'=> 'Supervisor Pilot',
            'email'=> 'demopilot@hotmail.com',
            'password'=> bcrypt('12345678'),
            'id_empresa'=>1,
            'id_sucursal'=>1,
            'Estado_eliminado'=>1


        ])->assignRole('Supervisor');

        User::create([
            'name'=> 'Usuario Pilot',
            'email'=> 'usuario@hotmail.com',
            'password'=> bcrypt('12345678'),
            'id_empresa'=>1,
            'id_sucursal'=>1,
            'Estado_eliminado'=>1


        ])->assignRole('Usuario');



        User::create([
            'name' => 'CLEMENT CABALLERO IVÁN',
            'email' => 'ivan.clement@organosintesis.com',
            'password' => bcrypt('ivan.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Administrador',
            'Estado_eliminado' => 1

        ])->assignRole('Administrador');



        User::create([
            'name' => 'QUINTANILLA VILLAGRAN ERIE RAFAEL',
            'email' => 'eriequintanilla@organosintesis.com',
            'password' => bcrypt('eriequintanilla.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Administrador',
            'Estado_eliminado' => 1

        ])->assignRole('Administrador');


        User::create([
            'name' => 'PINEDA ALVARADO GERARDO ',
            'email' => 'gpa@organosintesis.com',
            'password' => bcrypt('gpa.2022 '),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Administrador',
            'Estado_eliminado' => 1

        ])->assignRole('Administrador');





        User::create([
            'name' => 'VELASCO MONTEJO BAYARDO ESAU',
            'email' => 'bevm@organosintesis.com',
            'password' => bcrypt('bevm.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Supervisor',
            'Estado_eliminado' => 1


        ])->assignRole('Supervisor');

        User::create([
            'name' => 'VEGA GARRIDO JUAN DIEGO',
            'email' => 'jdvg@organosintesis.com',
            'password' => bcrypt('jdvg.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Supervisor',
            'Estado_eliminado' => 1


        ])->assignRole('Supervisor');


        User::create([
            'name' => 'SOTO VILLASEÑOR FEDERICO',
            'email' => 'fsoto@organosintesis.com',
            'password' => bcrypt('fsoto.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Supervisor',
            'Estado_eliminado' => 1


        ])->assignRole('Supervisor');


        User::create([
            'name' => 'ROMERO MOLINA GENARO',
            'email' => 'gromero@organosintesis.com',
            'password' => bcrypt('gromero.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'REBOLLO VALLEJO ALBINO',
            'email' => 'arv@organosintesis.com',
            'password' => bcrypt('arv.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'SÁNCHEZ MÉNDEZ GREGORIO',
            'email' => 'gsm@organosintesis.com',
            'password' => bcrypt('gsm.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'MEJÍA SALAZAR DANIEL',
            'email' => 'danielmejia@organosintesis.com',
            'password' => bcrypt('danielmejia.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'ORTIZ LÓPEZ EDGAR',
            'email' => 'edgarlopez@organosintesis.com',
            'password' => bcrypt('edgarlopez.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');



        User::create([
            'name' => 'PADILLA HUERTA  WILLIAM CRYSTIAN',
            'email' => 'william@organosintesis.com',
            'password' => bcrypt('william.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'RODRÍGUEZ MONSALVO ERIK ALAIN',
            'email' => 'erikrodriguez@organosintesis.com',
            'password' => bcrypt('erikrodriguez.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'GÓMEZ CABALLERO ALFONSO',
            'email' => 'agomez@organosintesis.com',
            'password' => bcrypt('agomez.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'CORTÉS CID HUMBERTO',
            'email' => 'humberto@organosintesis.com',
            'password' => bcrypt('humberto.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'CARRILLO MUÑOZ MAYTRELLI',
            'email' => 'mcarrillo@organosintesis.com',
            'password' => bcrypt('mcarrillo.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'VELASCO TRUJILLO JOSÉ DEL CARMEN',
            'email' => 'jdc@organosintesis.com',
            'password' => bcrypt('jdc.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'ZEPEDA PICHARDO FERNANDO',
            'email' => 'fernandoz@organosintesis.com',
            'password' => bcrypt('fernandoz.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'VALENCIA ARCADIO TEODORO',
            'email' => 'T.Valencia@organosintesis.com',
            'password' => bcrypt('T.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');


        User::create([
            'name' => 'MARTÍNEZ PEÑA JOSÉ LUIS',
            'email' => 'J.Luismartinez@organosintesis.com',
            'password' => bcrypt('J.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');



        User::create([
            'name' => 'CASTAÑEDA ROMERO LUIS ENRIQUE',
            'email' => 'lecr@organosintesis.com',
            'password' => bcrypt('lecr.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'MONDRAGÓN GUTIÉRREZ OSCAR',
            'email' => 'o.mondragon@organosintesis.com',
            'password' => bcrypt('o.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'CONTRERAS MARTÍNEZ MANUEL',
            'email' => 'm.contreras@organosintesis.com',
            'password' => bcrypt('m.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'NAVARRETE JIMÉNEZ ALEJANDRO',
            'email' => 'aux_alm@organosintesis.com',
            'password' => bcrypt('aux_alm.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');



        User::create([
            'name' => 'CONTRERAS REYNOSO JOSÉ LUIS',
            'email' => 'jlcr@organosintesis.com',
            'password' => bcrypt('jlcr.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'ANDRADE JUÁREZ EDGAR',
            'email' => 'eaj@organosintesis.com',
            'password' => bcrypt('eaj.2022'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');
        User::create([
            'name' => 'prub',
            'email' => 'bhilario@empresavirtual.mx',
            'password' => bcrypt('12345678'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');
        User::create([
            'name' => 'Aide',
            'email' => 'bryaaan99@gmail.com',
            'password' => bcrypt('12345678'),
            'id_empresa' => 1,
            'id_sucursal' => 1,
            'tipo_cuenta' => 'Usuario',
            'Estado_eliminado' => 1


        ])->assignRole('Usuario');

        User::create([
            'name' => 'Cabos Monalisa',
            'email' => 'monalisa@prb.com',
            'password' => bcrypt('12345678'),
            'id_empresa' => 2,
            'id_sucursal' => 2,
            'tipo_cuenta' => 'Administrador',
            'Estado_eliminado' => 1


        ])->assignRole('AdminMonalisa');





    }
}
