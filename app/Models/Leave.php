<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'emp_id',
        'leave_type',
        'days',
        'start_date',
        'end_date',
        'reason'
    ];

 // relation with User
 public function userinfo()
 {
     return $this->hasOne(User::class,'id','emp_id');
 }


}
