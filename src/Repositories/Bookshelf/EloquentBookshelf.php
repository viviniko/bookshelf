<?php

namespace Viviniko\Bookshelf\Repositories\Bookshelf;

use Viviniko\Repository\SimpleRepository;

class EloquentBookshelf extends SimpleRepository implements BookshelfRepository
{
    /**
     * @var string
     */
    protected $modelConfigKey = 'bookshelf.bookshelf';

    /**
     * {@inheritdoc}
     */
    public function findByUserId($userId)
    {
        return $this->findBy(['user_id' => $userId]);
    }

    /**
     * {@inheritdoc}
     */
    public function findByUserIdAndBookId($userId, $bookId)
    {
        return $this->findBy(['user_id' => $userId, 'book_id' => $bookId])->first();
    }

    /**
     * {@inheritdoc}
     */
    public function existsUserIdAndBookId($userId, $bookId)
    {
        return parent::exists(['user_id' => $userId, 'book_id' => $bookId]);
    }
}