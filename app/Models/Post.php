<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    #campos para asignacion masiva
    #requisito basicamente al trabajar con formulario
    protected $fillable =[
        'title',
        'body'
    ];
}
