<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'message',
        'phone_number'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
