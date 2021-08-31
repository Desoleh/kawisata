<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationFile extends Model
{
    use HasFactory;

        protected $guarded = ['id'];

        public function regulation()
    {
        return $this->belongsTo(Regulation::class);
    }

}
