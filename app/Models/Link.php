<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'url',
        'icon',
        'order',
        'is_active',
    ];

    /**
     * Get the user that owns the link.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
