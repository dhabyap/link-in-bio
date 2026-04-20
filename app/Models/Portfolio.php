<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'external_api_url',
        'thumbnail_path',
        'order',
    ];

    /**
     * Get the user that owns the portfolio item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
