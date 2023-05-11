<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["cod", "state", "image"];
    // protected $hidden = [];
    protected $dates = ["created_at", "updated_at", "deleted_at"];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot("value");
    }
}
