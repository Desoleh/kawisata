<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'position_id',
        'name',
        'grade',
        'holder_id',
        'parent_id',
        'parent_name',
        'hierarchy'
    ];

    public function mailbox()
    {
        return $this->hasOne(Mailbox::class, 'approver_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'nip');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'nip');
    }

}
