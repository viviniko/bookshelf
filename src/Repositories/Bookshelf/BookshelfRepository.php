<?php

namespace Viviniko\Bookshelf\Repositories\Bookshelf;

interface BookshelfRepository
{
    /**
     * @param $userId
     * @param $bookId
     * @return mixed
     */
    public function findByUserIdAndBookId($userId, $bookId);

    /**
     * @param $userId
     * @param $bookId
     * @return bool
     */
    public function existsUserIdAndBookId($userId, $bookId);

    /**
     * @param $userId
     * @return \Illuminate\Support\Collection
     */
    public function findByUserId($userId);

    /**
     * Create new customer.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update customer specified by it's id.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete customer with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}