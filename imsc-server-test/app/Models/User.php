<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ["username", "password"];
    protected $hidden = ["password", "remember_token"];
    protected $dates = ["created_at", "updated_at", "deleted_at"];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
