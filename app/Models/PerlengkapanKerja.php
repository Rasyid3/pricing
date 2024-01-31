<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerlengkapanKerja extends Model
{
    use HasFactory;
    protected $table = 'perlengkapan_kerja';
    protected $fillable = [
        'perlengkapan',
        'nominal_persentase',
    ];
}
