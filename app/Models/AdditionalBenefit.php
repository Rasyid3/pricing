<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalBenefit extends Model
{
    use HasFactory;
    protected $table = 'additional_benefit';
    protected $fillable = [
        'benefit',
        'nominal_persentase',
    ];
}
