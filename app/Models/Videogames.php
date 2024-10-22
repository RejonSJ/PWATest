<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Videogames extends Model
{
    protected $table = 'videogame';
    
    static $rules = [
    ];

    protected $fillable = ['id','name','image','review','status','created_at','updated_at'];
}

?>