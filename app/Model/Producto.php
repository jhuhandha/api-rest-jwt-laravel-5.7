<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $table = "producto";

    protected $fillable = ["nombre", "precio", "categoria_id", "cantidad", "estado"];

    public $timestamps = false;
}
