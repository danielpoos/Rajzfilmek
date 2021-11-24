<?php
namespace Petrik\Rajzfilmek;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model{
    protected $table ="kategoria";
    public $timestamps = false;
    protected $guarded = ['id'];
}