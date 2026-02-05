<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['task', 'task_time', 'is_completed', 'user_id'];

    protected $casts = [
        'task_time' => 'datetime',
    ];
}
