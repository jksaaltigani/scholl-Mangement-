<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptStudent extends Model
{
    use HasFactory;
    public function Student()
    {
        return $this->belongsTo(Student1::class);
    }
}