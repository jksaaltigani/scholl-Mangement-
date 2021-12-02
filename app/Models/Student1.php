<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;


class Student1 extends Model
{
    use SoftDeletes, HasFactory, HasTranslations;
    public $translatable = ['name'];



    ########################raltion section ######################
    public function Attachments()
    {
        return $this->morphMany(Attachement::class, 'Attcahmentable');
    }
    public function Classroom()
    {
        return $this->belongsTo(Clas::class, 'class_id');
    }

    public function Gender()
    {
        return $this->belongsTo(Gender::class);
    }


    public function International()
    {
        return $this->belongsTo(international::class);
    }

    public function Gard()
    {
        return $this->belongsTo(Gard1::class);
    }

    public function Class()
    {
        return $this->belongsTo(Clas::class, 'class_id');
    }
    public function Parent()
    {
        return $this->belongsTo(Parent1::class);
    }

    public function Section()
    {
        return $this->belongsTo(Section1::class);
    }
}