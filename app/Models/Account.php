<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    protected $guarded = [];

        public function employee()
    {

        return $this->belongsTo(Employee::class, 'nip');
    }


}
