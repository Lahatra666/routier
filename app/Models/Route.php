<?php

namespace App\Models;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = ['nomroute','idvilledep','idvillearrive','distance'];
    public function idvilledep(){
        return $this->belongsTo(Ville::class,'idville');
    }
    public function idvillearrive(){
        return $this->belongsTo(Ville::class,'idville');
    }
}
