<?php

namespace Viviniko\Bookshelf\Services;

use Carbon\Carbon;
use Viviniko\Book\Contracts\BookService;
use Viviniko\Bookshelf\Contracts\BookshelfService;
use Viviniko\Bookshelf\Repositories\Bookshelf\BookshelfRepository;

class BookshelfServiceImpl implements BookshelfService
{
    protected $bookshelfRepository;

    protected $bookService;

    public function __construct(BookshelfRepository $bookshelfRepository, BookService $bookService)
    {
        $this->bookshelfRepository = $bookshelfRepository;
        $this->bookService = $bookService;
    }

    /**
     * {@inheritdoc}
     */
    public function addBookToUserShelf($book, $user)
    {
        if (!$this->bookshelfRepository->existsUserIdAndBookId($user->id, $book->id)) {
            return $this->bookshelfRepository->create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'sort' => 0,
                'add_time' => new Carbon,
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeBookFromUserShelf($book, $user)
    {
        if ($item = $this->bookshelfRepository->findByUserIdAndBookId($user->id, $book->id)) {
            return $this->bookshelfRepository->delete($item->id);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getBooksFromUserShelf($user)
    {
        return $this->bookshelfRepository->findByUserId($user->id)->sortBy('sort')->map(function ($item) {
            return $this->bookService->getBook($item->bookId);
        });
    }
}