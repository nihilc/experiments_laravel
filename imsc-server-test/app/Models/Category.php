<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["name", "description"];
    // protected $hidden = ["created_at", "updated_at", "deleted_at"];
    protected $dates = ["created_at", "updated_at", "deleted_at"];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
