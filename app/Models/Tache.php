<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Tache extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['parent_id', 'titre', 'due_date'];


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }


    public function subtasks()
    {
        return $this->hasMany(self::class, 'parent_id');
    }



}
