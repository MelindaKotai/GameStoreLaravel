<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joc extends Model
{
    protected $table = "jocuri";

    protected $fillable = [
        'denumire', 'prt','descriere','nr_min_jucatori','nr_max_jucatori','categorieID','img'
    ];
}
