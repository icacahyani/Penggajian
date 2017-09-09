<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $fillable = ['Nip', 'Nama_karyawan', 'jabatan_id', 'Alamat', 'JK', 'No_hp', 'Tpt_lahir', 'Tgl_lahir', 'Photo'];
    protected $visible = ['Nip', 'Nama_karyawan', 'jabatan_id', 'Alamat', 'JK', 'No_hp', 'Tpt_lahir', 'Tgl_lahir', 'Photo'];
    public $timestamps = true;

    public function Jabatan()
    {
    	return $this->belongsTo('App\Jabatan');
    }
}
