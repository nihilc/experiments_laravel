<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["name"];
    // protected $hidden = ["deleted_at"];
    protected $dates = ["deleted_at"];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function items()
    {
        return $this->belongsToMany(Items::class);
    }
}
