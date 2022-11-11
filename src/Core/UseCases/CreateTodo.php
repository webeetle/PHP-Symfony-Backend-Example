<?php

namespace App\Core\UseCases;

use App\Core\Repository\ITodoRepository;

class CreateTodo
{
    private ITodoRepository $todoRepository;

    public function __construct(ITodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute($title, $description, $userId)
    {
        $todo = $this->todoRepository->create($title, $description, $userId);

        return $todo;
    }

}