<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    protected $table = 'kendaraans';
    protected $primaryKey = 'id_kendaraan';
    public $timestamps = true;
    protected $fillable = ['merk_kendaraan',
                            'tipe_kendaraan'];
}
