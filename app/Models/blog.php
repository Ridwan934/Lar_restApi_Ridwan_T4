<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class blog extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "blogs";
}