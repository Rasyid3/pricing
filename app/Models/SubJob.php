<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubJob extends Model
{
    use HasFactory;
    protected $table = 'sub_job';
    protected $fillable = ['subtitle', 'job_id', 'additional_wage','tunjangan_jabatan',
    'tunjangan_komunikasi','tunjangan_transportasi','tunjangan_makan','tunjangan_lembur',
    'tunjangan_shift'];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
