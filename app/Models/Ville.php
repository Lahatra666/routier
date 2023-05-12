<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
     protected $fillable = ['nomville'];
    // public $nomville;
    public function routes(){
        return $this->hasMany(Route::class,'idville');
    }
    // public function villeroutearrive(){
    //     return $this->hasMany(Route::class,'idville');
    // }
}
