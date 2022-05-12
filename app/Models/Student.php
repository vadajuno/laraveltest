<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'major_id',
        'ipk',
    ];

    public function major()
    {
        return $this->belongsTo('App\Models\Major');
    }
}
