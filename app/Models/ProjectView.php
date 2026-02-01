<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectView extends Model
{
    protected $fillable = ['projects_id' , 'ip_address'];

    public function project()
    {
        
        return $this->belongsTo(Projects::class, 'projects_id');
    }
}
