<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devoir extends Model
{
    public function file()
    {
        return $this->belongsTo(File::class , 'code');
    }
}
