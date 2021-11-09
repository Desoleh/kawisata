<?php

namespace App\Models;

use App\Models\Regulation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegulationFile extends Model
{
    use HasFactory;

        protected $guarded = ['id'];

    public function regulation()
    {
        return $this->belongsTo(Regulation::class);
    }

}
