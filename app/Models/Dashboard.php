<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $fillable=['name','workbook_name','view_name','site_name','category','order'];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
