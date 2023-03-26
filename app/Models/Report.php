<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        "description",
        'slug',
        'image',
        "report",
        'tags',
        'game',
    ];

    protected $casts = [
        'report' => 'array',
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
