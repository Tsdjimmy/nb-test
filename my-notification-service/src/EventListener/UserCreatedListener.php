<?php

namespace App\EventListener;

use App\Event\UserCreatedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


class UserCreatedListener
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(UserCreatedEvent $event)
    {
        $this->logger->info('User created in Notification service');
        // echo "DONEEEE";
    }
}
