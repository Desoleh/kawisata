<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySlip extends Model
{
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'type',
        'uuid',
        'filename',
        'nip',
        'monthyear'
    ];
}
