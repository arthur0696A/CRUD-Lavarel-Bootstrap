<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['title','description','image','stock'];
    public $timestamps = false;
    
}
