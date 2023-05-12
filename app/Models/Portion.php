<?php

namespace App\Models;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portion extends Model
{
    use HasFactory;
    protected $primaryKey='idportion';
    protected $fillable = ['idroute','debut','fin','etat'];
    // public function route(){
    //     return $this->belongsTo(Route::class);
    // }
}
