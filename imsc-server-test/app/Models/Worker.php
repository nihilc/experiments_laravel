<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "icard",
        "fname",
        "mname",
        "lname",
        "mlname",
        "photo",
        "phone",
        "email",
        "title",
    ];
    // protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates = ["created_at", "updated_at", "deleted_at"];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
