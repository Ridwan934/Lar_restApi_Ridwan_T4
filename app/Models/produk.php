<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class produk extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "produks";

}