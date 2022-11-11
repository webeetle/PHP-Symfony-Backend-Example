<?php

namespace App\Infrastructure\Repository;

use App\Core\Entities\User;
use App\Core\Repository\IUserRepository;

class UserInMemory implements IUserRepository
{
    private array $users = [];

    public function create($name, $email, $password)
    {
        $user = new User(
            uniqid(),
            $name,
            $email,
            $password,
            new \DateTime(),
            new \DateTime()
        );

        $this->users[$user->getId()] = $user;

        return $user;
    }

    public function update($user)
    {
        $this->users[$user->getId()] = $user;
    }

    public function delete($id)
    {
        unset($this->users[$id]);
    }

    public function find($id)
    {
        return $this->users[$id];
    }

    public function findAll()
    {
        return $this->users;
    }

    public function findByEmail($email)
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
    }
}