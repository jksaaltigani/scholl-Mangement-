<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gard1 extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    public function classRoom()
    {
        return $this->hasMany(Clas::class, 'gard_id', 'id');
    }

    public function sections()
    {
        return $this->hasMany(Section1::class, 'gard_id', 'id');
    }
}