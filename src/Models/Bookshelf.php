<?php

namespace Viviniko\Bookshelf\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class Bookshelf extends Model
{
    protected $tableConfigKey = 'bookshelf.bookshelves_table';

    public $timestamps = false;

    protected $fillable = [
        'book_id', 'user_id', 'add_time', 'sort',
    ];

    protected $casts = [
        'add_time' => 'datetime',
    ];

    public function book()
    {
        return $this->belongsTo(Config::get('book.book'), 'book_id');
    }
}