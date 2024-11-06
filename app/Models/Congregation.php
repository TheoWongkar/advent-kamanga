<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congregation extends Model
{
    /** @use HasFactory<\Database\Factories\CongregationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'age',
        'address',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
