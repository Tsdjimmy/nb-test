<?php
namespace App\EventListener;

use App\Event\UserCreatedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserCreatedListener implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(UserCreatedEvent $event)
    {
        $this->logger->info('User created in Users service', [
            'userId' => $event->getUserId(),
            'email' => $event->getEmail(),
            'firstName' => $event->getFirstName(),
            'lastName' => $event->getLastName(),
        ]);
    }
}