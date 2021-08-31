<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationChange extends Model
{
    use HasFactory;

    public function regulation()
    {
        return $this->belongsTo(Regulation::class);
    }

}
