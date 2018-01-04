<?php

namespace Viviniko\Bookshelf;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Viviniko\Bookshelf\Models\BookshelfPivot;

trait HasBookshelf
{
    public function addBookToShelf($book)
    {
        $this->books()->attach([
            $book->id => ['add_time' => new Carbon, 'sort' => 0],
        ]);
    }

    public function removeBookFromShelf($book)
    {
        $this->books()->detach($book->id);
    }

    public function shelfBooks()
    {
        return $this->belongsToMany(Config::get('book.book'), Config::get('bookshelf.bookshelves_table'))
            ->using(BookshelfPivot::class)
            ->withPivot(['add_time', 'sort']);
    }
}