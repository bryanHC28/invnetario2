<?php

namespace App\Imports;

use App\Models\tablamaestra;
use App\Models\Areas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EquiposImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading
{

    private $areas;

    public function __construct()
    {
        $this->areas = Areas::pluck('id', 'nombre');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tablamaestra([
            'Equipo'  => $row['equipo'],
            'Categoria' => $row['categoria'],
            'Modelo'    => $row['modelo'],
            'Area'    => $row['area'],
            'Clave'    => $row['clave']
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
