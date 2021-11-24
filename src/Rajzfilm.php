<?php
namespace Petrik\Rajzfilmek;

use Illuminate\Database\Eloquent\Model;

class Rajzfilm extends Model{
    protected $table ="rajzfilmek";
    public $timestamps = false;

    //protected $fillable = ['whitelist1', 'whitelist2']; 
    protected $guarded = ['id']; //blacklist
}