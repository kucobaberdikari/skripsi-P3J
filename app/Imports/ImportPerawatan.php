<?php

namespace App\Imports;

use App\Models\transaksi_perawatan;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPerawatan implements ToModel
{
   
    public function model(array $row)
    {
        
        return new transaksi_perawatan([
            'id_transaksi' => $row[1],
            'id_pelanggan' => $row[2],
            'nama' => $row[3],
            'alamat' => $row[4],
            'kodepos' =>$row[5],
            'telepon' => $row[6],
            'email' => $row[7],
            'perawatan' => $row[8],
            'deskripsi' => $row[9],
            'biaya' => $row[10],
            'tanggal_diproses' =>$row[11],
            'teknisi' =>$row[12],
            'status' => $row[13]
        ]);
    }
}
