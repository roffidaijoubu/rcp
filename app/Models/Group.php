<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function dashboards()
    {
        return $this->belongsToMany(Dashboard::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
