<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'credits','photo_produit','photo_humain', 'type','format', 'genre', 'release_year', 'poster'];
}
