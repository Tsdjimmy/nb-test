<?php

namespace App\Tests\Repository;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
{
    private $entityManager;
    private $userRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()->get(EntityManagerInterface::class);
        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    public function testCreateUser()
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setFirstName('John');
        $user->setLastName('Doe');

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $retrievedUser = $this->userRepository->findOneBy(['email' => 'test@example.com']);

        $this->assertInstanceOf(User::class, $retrievedUser);
        $this->assertEquals('test@example.com', $retrievedUser->getEmail());
    }
}