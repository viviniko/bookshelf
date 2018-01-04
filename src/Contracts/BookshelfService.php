<?php

namespace Viviniko\Bookshelf\Contracts;

interface BookshelfService
{
    public function addBookToUserShelf($book, $user);

    public function removeBookFromUserShelf($book, $user);

    public function getBooksFromUserShelf($user);
}