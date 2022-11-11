<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;
use App\Core\Repository\IUserRepository;
use Psr\Log\LoggerInterface;

class CreateUser
{
    private IUserRepository $userRepository;
    private LoggerInterface $logger;

    public function __construct(IUserRepository $userRepository, LoggerInterface $logger)
    {
        $this->userRepository = $userRepository;
        $this->logger = $logger;
    }

    /**
     *
     * Use case to create a new user
     *
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return User
     *
     * @throws \Exception
     */
    public function execute($name, $email, $password)
    {
        $this->logger->info('Creating user - name: ' . $name . ' email: ' . $email);

        if ($this->userRepository->findByEmail($email)) {
            throw new \Exception('User already exists');
        }

        if (strlen($password) < 6) {
            throw new \Exception('Password must be at least 6 characters');
        }

        return $this->userRepository->create($name, $email, $password);
    }

}