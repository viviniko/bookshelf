<?php

namespace Viviniko\Bookshelf\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookshelfPivot extends Pivot
{
    public $timestamps = false;

    protected $fillable = [
        'book_id', 'user_id', 'add_time', 'sort',
    ];

    protected $casts = [
        'add_time' => 'datetime',
    ];
}