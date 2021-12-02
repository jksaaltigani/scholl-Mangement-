<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher1 extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];


    public function  Specialzations()
    {
        return $this->belongsTo(Specialzation::class, 'Specialzation_id', 'id');
    }

    public function  Gender()
    {
        return $this->belongsTo(Gender::class, 'gander_id', 'id');
    }

    public function sections()
    {
        return $this->belongsToMany(Teacher::class, 'sections_teachres');
    }
}