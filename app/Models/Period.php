<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'duration',
        'mood',
        'flow_intensity',
        'symptoms',
        'notes',
    ];

    protected $casts = [
        'symptoms' => 'array', // Mengubah JSON menjadi array saat diakses
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
