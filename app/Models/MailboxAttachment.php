<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxAttachment extends Model
{
    use HasFactory;
    protected $fillable=[
        'mailbox_id',
        'attachment',
        'created_at',
        'updated_at',
    ];

    public function mailboxes()
    {
        return $this->belongsTo(Mailbox::class,'mailbox_id');
    }

    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }
}
