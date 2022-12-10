<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kabupaten extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = "m_kabupaten";
    protected $primaryKey = "id_kabupaten";
    protected $fillable = ['nama_kabupaten'];

    // public function kecamatan()
    // {
    //     $this->hasMany(Kecamatan::class);
    // }
}
