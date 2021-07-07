<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mailbox extends Model
{


    public $incrementing = false;

    use HasFactory;


    protected $fillable =[
        'id',
        'document_id',
        'perihal',
        'body',
        'is_draft',
        'draft_created_at',
        'approver_id',
        'drafter_id',
        'created_at',
        'updated_at',
    ];

     public function approver()
    {
        return $this->belongsTo(Position::class, "approver_id");
    }

    public function positions()
    {
        return $this->belongsTo(Position::class, 'approver_id','position_id');
    }

    public function receivers()
    {
        return $this->hasMany(MailboxReceiver::class);
    }

    public function tmpreceivers()
    {
        return $this->hasMany(MailboxTmpReceiver::class);
    }

    public function checkers()
    {
        return $this->hasMany(MailboxChecker::class);
    }

    public function tmpcheckers()
    {
        return $this->hasMany(MailboxTmpChecker::class);
    }

    public function copiers()
    {
        return $this->hasMany(MailboxCopy::class);
    }

    public function tmpcopiers()
    {
        return $this->hasMany(MailboxCopy::class);
    }


    public function mailbox_attachments()
    {
        return $this->hasMany(MailboxAttachment::class, 'mailbox_id', 'id');
    }

    public function mailbox_flags()
    {
        return $this->hasMany(MailboxFlags::class);
    }

    public function mailbox_flag()
    {
        return $this->hasMany(MailboxFlags::class)->where('user_id', Auth::user()->id)->first();
    }

}
