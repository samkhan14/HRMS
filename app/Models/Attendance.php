<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'checkin',
        'checkout',
        'attendance_type',
        'status'
    ];

    protected $guarded = [];

    public $timestamps = false;

    // relation with User
    // public function userinfo()
    // {
    //     return $this->hasMany(Employee::class,'user_id','id');
    // }



}
