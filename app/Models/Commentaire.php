<?php

namespace App\Models;

use App\Models\Cour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public function cour(){
        return $this->belongsTo(Cour::class);
    }
}
