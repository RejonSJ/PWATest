<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Videogames extends Model
{
    use HasFactory;
    protected $table = 'videogame';
    
    static $rules = [
    ];

    protected $fillable = ['id','name','image','review','status','created_at','updated_at'];
}

?>