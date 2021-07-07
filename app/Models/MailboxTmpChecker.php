<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxTmpChecker extends Model
{
    use HasFactory;
        protected $fillable =[
        'mailbox_id',
        'receiver_id',
        'sequence',
        'created_at',
        'updated_at',
    ];

        public function mailbox()
    {
        return $this->belongsTo(Mailbox::class, 'mailbox_id');
    }

        public function checker()
    {
        return $this->belongsTo(Position::class, 'checker_id');
    }
}
