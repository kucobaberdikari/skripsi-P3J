<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksi_perawatan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['id_transaksi','id_pelanggan','nama','alamat','kodepos','telepon','email','perawatan','deskripsi','biaya','tanggal_diproses','teknisi','status'];

    protected $hidden=[];
}
