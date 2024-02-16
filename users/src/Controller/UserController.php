<?php

namespace App\Controller;

use App\Entity\User;
use App\Event\UserCreatedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/user', name: 'app_user')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    #[Route('/users', name: 'create_user', methods: ['POST'])]
    public function createUser(Request $request, MessageBusInterface $messageBus): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $userRepository = $this->entityManager->getRepository(User::class);

        $user = new User();
        $user->setEmail($data['email']);
        $user->setFirstName($data['firstName']);
        $user->setLastName($data['lastName']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $userCreatedEvent = new UserCreatedEvent($user->getId(), $user->getEmail(), $user->getFirstName(), $user->getLastName());
        $messageBus->dispatch($userCreatedEvent);

        return new JsonResponse(['message' => 'User created successfully'], 201);
    }
}
