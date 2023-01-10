<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['des_title'];
    protected $dates = ['deleted_at'];
}
