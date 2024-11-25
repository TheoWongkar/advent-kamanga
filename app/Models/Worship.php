<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    /** @use HasFactory<\Database\Factories\WorshipFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'preacher',
        'singer',
        'place',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
