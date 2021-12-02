<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Student()
    {
        return $this->belongsTo(Student1::class);
    }
    public function Ol_Gard()
    {
        return $this->belongsTo(Gard1::class, 'gard_from');
    }

    public function Ol_Class()
    {
        return $this->belongsTo(Clas::class, 'class_from');
    }


    public function Ol_Section()
    {
        return $this->belongsTo(Section1::class, 'section_from');
    }

    public function Gard()
    {
        return $this->belongsTo(Gard1::class, 'gard_to');
    }

    public function Class()
    {
        return $this->belongsTo(Clas::class, 'class_to');
    }


    public function Section()
    {
        return $this->belongsTo(Section1::class, 'section_to');
    }
}
