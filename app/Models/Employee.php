<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = "nip";
    protected $guarded = [];

        public function position()
    {

        return $this->hasOne(Position::class, 'holder_id');
    }

    // public function getTanggalLahirAttribute($value)
    // {
    //     return Carbon::parse($value)->isoFormat('DD MMMM YYYY');;
    // }

    // public function setTanggalLahirAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y/m/d');;
    // }

    // public function setNamaAttribute($value)
    // {
    //     return Str::title($value);
    // }

    public function getNamaAttribute($value)
    {
        return Str::title($value);
    }

            public function account()
    {

        return $this->hasOne(Account::class, 'nip');
    }

}
