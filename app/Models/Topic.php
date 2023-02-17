<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description'];

    public function users()
    {
        return $this->belongsTo((User::class));
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
