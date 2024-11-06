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
        'title',
        'preacher',
        'singer',
        'place',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
