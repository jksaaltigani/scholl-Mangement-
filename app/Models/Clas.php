<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;



class Clas extends Model
{
    use HasFactory, HasTranslations;
    public $translatable  = ['name'];
    protected $guarded = [];
    public function gard()
    {
        return  $this->belongsTo(Gard1::class, 'gard_id', 'id');
    }
}