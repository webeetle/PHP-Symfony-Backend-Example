<?php

namespace App\Core\UseCases;

use App\Core\Repository\ITodoRepository;

class MakeTodoDone
{
    private ITodoRepository $todoRepository;

    public function __construct(ITodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute($id)
    {
        $todo = $this->todoRepository->find($id);
        $todo->makeDone();
        $this->todoRepository->update($todo);
    }

}