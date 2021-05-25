<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
   protected $table = "categorii";
   protected $fillable = [
        'nume'
    ];
}
