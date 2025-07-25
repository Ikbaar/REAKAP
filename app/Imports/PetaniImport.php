<?php

namespace App\Imports;

use App\Models\Petani;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PetaniImport implements ToModel, WithHeadingRow
{
   public function model(array $row)
{
    // Cek apakah baris kosong total (semua kolom null atau kosong)
    if (
        empty($row['landid_vbw']) &&
        empty($row['name']) &&
        empty($row['koperasi']) &&
        empty($row['yop_vbw']) &&
        empty($row['village']) &&
        empty($row['luas_legalitas']) &&
        empty($row['luas_shp']) &&
        empty($row['legalitas']) &&
        empty($row['stdb']) &&
        empty($row['point_x']) &&
        empty($row['point_y']) &&
        empty($row['fkh548']) &&
        empty($row['konsesirea']) &&
        empty($row['wiup']) &&
        empty($row['iuphhk_hti_ha']) &&
        empty($row['nomor_legalitas'])
    ) {
        return null; // skip baris kosong
    }

    return new Petani([
        'landid_vbw'       => $row['landid_vbw'] ?? null,
        'name'             => $row['name'] ?? null,
        'koperasi'         => $row['koperasi'] ?? null,
        'yop_vbw'          => $row['yop_vbw'] ?? null,
        'village'          => $row['village'] ?? null,
        'luas_legalitas'   => $row['luas_legalitas'] ?? null,
        'luas_shp'         => $row['luas_shp'] ?? null,
        'legalitas'        => $row['legalitas'] ?? null,
        'stdb'             => $row['stdb'] ?? null,
        'point_x'          => $row['point_x'] ?? null,
        'point_y'          => $row['point_y'] ?? null,
        'fkh548'           => $row['fkh548'] ?? null,
        'konsesirea'       => $row['konsesirea'] ?? null, 
        'wiup'             => $row['wiup'] ?? null,
        'iuphhk_hti_ha'    => $row['iuphhk_hti_ha'] ?? null,
        'nomor_legalitas'  => $row['nomor_legalitas'] ?? null,
    ]);
}


}
