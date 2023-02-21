<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainManu extends Model
{
    use HasFactory;
    public function ParentMenu()
    {
        return $this->hasMany(\App\Models\Role\ParentManu::class, 'ParentMenu');
    }

    public function ParentMenuDetails()
    {
        return $this->belongsTo(\App\Models\Role\ParentManu::class, 'ParentMenu');
    }
    public function Project()
    {
        return $this->hasMany(\App\Models\Project\ProjectMaster::class, 'projectName');
    }

    public function ProjectDetails()
    {
        return $this->belongsTo(\App\Models\Project\ProjectMaster::class, 'projectName');
    }
}
