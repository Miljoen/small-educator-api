<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BackgroundImage extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'location',
        'width',
        'height',
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class);
    }
}
