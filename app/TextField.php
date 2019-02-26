<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TextField extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'content',
        'position-x',
        'position-y',
    ];

    // ------------------------------------------------------------------------------
    //      Relations
    // ------------------------------------------------------------------------------

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class);
    }
}
