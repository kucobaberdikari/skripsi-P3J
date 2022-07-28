<?php

namespace App\Imports;

use App\Models\transaksi_perbaikan;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPerbaikan implements ToModel
{

    public function model(array $row)
    {
        return new transaksi_perbaikan([
            'id_transaksi' => $row[1],
            'id_pelanggan' => $row[2],
            'nama' => $row[3],
            'alamat' => $row[4],
            'kodepos' =>$row[5],
            'telepon' => $row[6],
            'email' => $row[7],
            'deskripsi' => $row[8],
            'biaya' => $row[9],
            'tanggal_diproses' =>$row[10],
            'teknisi' =>$row[11],
            'status' => $row[12]
        ]);
    }
}
