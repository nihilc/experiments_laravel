<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["name", "email", "phone"];

    protected $hidden = [
        "created_at",
        "updated_at",
        "deleted_at",
        "department_id",
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
