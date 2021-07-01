<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = "nip";
    protected $guarded = [];

    // public function setDateAttribute( $value ) {
    // $this->attributes['date'] = (new Carbon($value))->format('d/m/y');

}
