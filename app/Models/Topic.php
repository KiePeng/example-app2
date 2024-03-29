<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title', 'description'];

    protected $append = ['reply_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getReplyCountAttribute(){
        return $this->replies()->count();
    }

    // public function getLastActionAttribute(){
    //     return $this->replies()->latest()->first();
    // }

}
