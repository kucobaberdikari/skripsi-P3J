<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perawatan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['id_pelanggan','nama','alamat','kodepos','telepon','email', 'perawatan','status','operator','tenggat'];

    protected $hidden=[];
}
