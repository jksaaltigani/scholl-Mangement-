<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section1 extends Model
{

    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];
    public function gard()
    {
        return $this->BelongsTo(Gards::class, 'id', 'gard_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,  'sections_teachers');
    }

    public function My_class()
    {
        return $this->belongsTo(ClassRoom::class);
    }
    /**
     * Get all of the comments for the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
}