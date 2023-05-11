<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["name", "acronym", "logo"];
    // protected $hidden = ["created_at", "updated_at", "deleted_at"];
    protected $dates = ["created_at", "updated_at", "deleted_at"];

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public function items()
    {
        return $this->hasMany(Items::class);
    }
}
