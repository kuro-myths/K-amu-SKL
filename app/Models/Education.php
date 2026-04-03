<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'url',
        'category_id',
        'level',
        'created_by',
        'status',
        'is_featured',
        'views',
        'thumbnail',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
        ];
    }

    public function getLevelLabelAttribute(): string
    {
        return match ($this->level) {
            'basic' => 'Dasar',
            'intermediate' => 'Menengah',
            'advanced' => 'Lanjutan',
            'free' => 'Gratis',
            default => ucwords(str_replace('-', ' ', (string) $this->level)),
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Menunggu',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            default => ucfirst((string) $this->status),
        };
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($education) {
            if (empty($education->slug)) {
                $education->slug = Str::slug($education->title) . '-' . Str::random(5);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function bookmarkedByUsers()
    {
        return $this->belongsToMany(User::class, 'bookmarks');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeByLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    public function scopePopular($query)
    {
        return $query->orderByDesc('views');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function averageRating(): float
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function isBookmarkedBy(?User $user): bool
    {
        if (!$user) return false;
        return $this->bookmarks()->where('user_id', $user->id)->exists();
    }
}
