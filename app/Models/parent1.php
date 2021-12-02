<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class parent1 extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['Name_Father', 'Name_Mother', 'Job_Mother', 'Job_Father'];
    protected $table = 'parent1s';
}