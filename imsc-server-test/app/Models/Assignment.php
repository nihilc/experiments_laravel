<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["type", "date", "note"];
    // protected $hidden = ["created_at", "updated_at", "deleted_at"];
    protected $dates = ["created_at", "updated_at", "deleted_at"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot([
            "assign_note",
            "return_note",
            "return_date",
        ]);
    }
}
