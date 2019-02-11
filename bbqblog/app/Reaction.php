<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = [
        'post_id',
        'name',
        'message'
    ];

    /**
     * @return string
     */
    public function getMeta()
    {
        return sprintf('Geplaatst door %s op %s', $this->name, $this->created_at->formatLocalized('%A %e %B %Y %H:%M'));
    }
}
