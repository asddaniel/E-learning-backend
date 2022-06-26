<?php

namespace App\Models;
use App\Models\Commentaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

      public function comments()
    {
        return $this->hasMany(Commentaire::class);
    }
}
