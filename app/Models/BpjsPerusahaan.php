<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BpjsPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'bpjs_perusahaan';
    protected $fillable = [
        'nama_bpjs',
        'nominal_persentase',
    ];
}
