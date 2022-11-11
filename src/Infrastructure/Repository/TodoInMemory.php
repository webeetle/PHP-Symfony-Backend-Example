<?php

namespace App\Infrastructure\Repository;

use App\Core\Entities\Todo;
use App\Core\Repository\ITodoRepository;

class TodoInMemory implements ITodoRepository
{
    private array $todos = [];

    public function create($title, $description, $userId)
    {
        $todo = new Todo(
            uniqid(),
            $title,
            $description,
            false,
            new \DateTime(),
            new \DateTime(),
            $userId
        );

        $this->todos[$todo->getId()] = $todo;

        return $todo;
    }

    public function update($todo)
    {
        $this->todos[$todo->getId()] = $todo;
    }

    public function delete($id)
    {
        unset($this->todos[$id]);
    }

    public function find($id)
    {
        return $this->todos[$id];
    }

    public function findAll()
    {
        return $this->todos;
    }
}