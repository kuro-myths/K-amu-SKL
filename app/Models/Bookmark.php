<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bookmark extends Model
{
    protected $table = 'bookmarks';

    protected $fillable = [
        'user_id',
        'education_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class);
    }
}
