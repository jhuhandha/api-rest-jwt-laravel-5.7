<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $table = "categoria";

    protected $fillable = ["nombre"];

    public $timestamps = false;
}
