<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = "pengaduans";
    protected $fillable = ['unique_id ','tgl_pengaduan','nik','isi_laporan','status'];

    /**
     * Get all of the comments for the Pengaduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tanggapan()
    {
        return $this->hasMany(tanggapan::class);
    }
}
