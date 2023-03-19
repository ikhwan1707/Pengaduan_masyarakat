<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $fillaable = ['id_pengaduan','tgl_tanggapan','tanggapan','user_id'];

   /**
    * Get the user that owns the Tanggapan
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function pengaduan()
   {
       return $this->belongsTo(pengaduan::class, 'id_pengaduan', 'id_pengaduan');
   }
}
