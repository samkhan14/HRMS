<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'password',
        'son_of',
        'persnol_email',
        'age',
        'dob',
        'gender',
        'city',
        'address',
        'persnol_number',
        'marital_status',

    ];

    // relation with Designation
    public function designation()
    {
        return $this->belongsTo(Designation::class,'desg_id');
    }

   // relation with department
    public function department()
    {
        return $this->belongsTo(Department::class,'dep_id');
    }

    // relation with User
    public function userinfo()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    // Employee type relation
    public function empType()
    {
        return $this->hasOne(Employee_type::class,'id','etype_id');
    }


}
