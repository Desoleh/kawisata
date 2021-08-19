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

    public function oncycle()
    {
        return $this->hasMany(Oncycle::class,'nip');
    }

    public function offcycle()
    {
        return $this->hasMany(Offcycle::class,'nip');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
}
}
