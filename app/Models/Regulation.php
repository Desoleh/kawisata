<?php

namespace App\Models;

use App\Models\RegulationFile;
use App\Models\RegulationChange;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
