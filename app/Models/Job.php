<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';
    protected $fillable = ['title'];
    public function subJobs()
    {
        return $this->hasMany(SubJob::class, 'job_id');
    }

}
