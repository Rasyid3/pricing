<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'person';
    protected $fillable = ['name', 'umk_id','job_id','sub_job_id'];

    public function umk()
    {
        return $this->belongsTo(Umk::class, 'umk_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function subJob()
    {
        return $this->belongsTo(SubJob::class, 'sub_job_id');
    }
}
