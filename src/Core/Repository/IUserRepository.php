<?php

namespace App\Core\Repository;

interface IUserRepository
{
    public function create($name, $email, $password);
    public function update($user);
    public function delete($id);
    public function find($id);
    public function findAll();
    public function findByEmail($email);
}