<?php

namespace App\Core\Repository;

interface ITodoRepository
{
    public function create($title, $description, $userId);
    public function update($todo);
    public function delete($id);
    public function find($id);
    public function findAll();
}