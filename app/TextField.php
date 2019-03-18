<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TextField extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'content',
        'x',
        'y',
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function slides(): BelongsToMany
    {
        return $this->belongsToMany(Slide::class);
    }
}
