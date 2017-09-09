<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    //
    protected $fillable = ['Kode_jabatan', 'Nama_jabatan', 'Gaji_pokok'];
    protected $visible = ['Kode_jabatan', 'Nama_jabatan', 'Gaji_pokok'];
    public $timestamps = true;

    public function Karyawan()
    {
    	return $this->hasMany('App\Karyawan');
    }
}
