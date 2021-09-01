<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function regulationfiles()
    {
        return $this->hasMany(RegulationFile::class);
    }

    public function regulationchanges()
    {
        return $this->hasMany(RegulationChange::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }
}
