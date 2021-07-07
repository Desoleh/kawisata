<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxCopy extends Model
{
    use HasFactory;
        protected $fillable =[
        'mailbox_id',
        'copy_id',
        'created_at',
        'updated_at',
    ];

        public function mailbox()
    {
        return $this->belongsTo(Mailbox::class, 'mailbox_id');
    }

        public function copy()
    {
        return $this->belongsTo(Position::class, 'copy_id');
    }


}
