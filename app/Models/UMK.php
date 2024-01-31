<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMK extends Model
{
    use HasFactory;
    protected $table = 'umk';
    protected $fillable = ['regency', 'wage'];
}
