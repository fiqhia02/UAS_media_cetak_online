<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table='pembayaran_online';
    protected $primaryKey='id_pembayaran';
    protected $fillable=['id_dokumen','id_petugas','status_pembayaran', 'jenis_pembayaran'];
}
