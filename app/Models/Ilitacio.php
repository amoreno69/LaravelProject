<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilitacio extends Model
{
    use HasFactory;
    protected $table = "Ilitacio";
    protected $fillable = ["preu", "data_ilitacio"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subasta(){
        return $this->belongsTo(Subasta::class);
    }
}
