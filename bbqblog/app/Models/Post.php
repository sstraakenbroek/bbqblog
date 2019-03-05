<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'description',
        'slug'
    ];
    //protected $guarded = [];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * @param string $value
     */
    public function setTitleAttribute(string $value): void
    {
        // @TODO - https://github.com/cviebrock/eloquent-sluggable
        // Prevent routes as slugs and prevent existing slugs
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value, '-');
    }

    /**
     * Connect post to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    /**
     * @return string
     */
    public function getMeta(): string
    {
        return sprintf('Geplaatst door %s op %s', $this->user->name, $this->created_at->formatLocalized('%A %e %B %Y %H:%M'));
    }

    /**
     * @param array $attributes
     */
    public function addReaction(array $attributes): void
    {
        $this->reactions()->create($attributes);
    }
}
