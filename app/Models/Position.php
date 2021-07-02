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
    ];

    public function mailbox()
    {
        return $this->hasOne(Mailbox::class, 'approver_id');
    }

}
