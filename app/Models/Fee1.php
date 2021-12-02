<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Fee1 extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];

    public function Gard()
    {
        return $this->belongsTo(Gard1::class);
    }

    public function Class()
    {
        return $this->belongsTo(Clas::class);
    }
}