<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;
    public function Student()
    {
        return $this->belongsTo(Student1::class);
    }
    public function Gard()
    {
        return $this->belongsTo(Gard1::class);
    }

    public function Class()
    {
        return $this->belongsTo(Clas::class);
    }
}