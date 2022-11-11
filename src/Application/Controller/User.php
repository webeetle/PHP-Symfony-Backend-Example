<?php

namespace App\Application\Controller;

use App\Core\UseCases\CreateUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class User extends AbstractController
{

    #[Route('/api/user', name: 'create_user', methods: ['POST'])]
    public function hello(SerializerInterface $serializer, CreateUser $createUser, Request $request): Response
    {
        $body = $serializer->deserialize($request->getContent(), 'App\Application\DTO\CreateUser', 'json');

        $user = $createUser->execute($body->name, $body->email, $body->password);

        $response = new Response($serializer->serialize($user, 'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}