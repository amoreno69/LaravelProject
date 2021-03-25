<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotxe extends Model
{
    use HasFactory;
    protected $table = "Cotxe";
    protected $fillable = ["nom", "matricula", "tipus_de_cotxe", "motor", "path", "marca", "subasta"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subasta(){
        return $this->hasMany(Subasta::class);
    }
}
