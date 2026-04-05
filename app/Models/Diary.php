<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = ['date', 'body', 'user_id', 'mood_note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
