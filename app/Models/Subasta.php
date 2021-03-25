<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
    use HasFactory;
    protected $table = "Subasta";
    protected $fillable = ["ilitació_minima", "data_final", "activa"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cotxe(){
        return $this->belongsTo(Cotxe::class);
    }

    public function ilitacio(){
        return $this->hasMany(Ilitacio::class);
    }
}
