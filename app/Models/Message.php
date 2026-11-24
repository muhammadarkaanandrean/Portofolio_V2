<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Whitelist: kolom lain (mis. is_read) otomatis dibuang walau dikirim pengunjung
    protected $fillable = ['sender_name', 'sender_email', 'subject', 'body'];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
