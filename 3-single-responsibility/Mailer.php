<?php

declare(strict_types=1);

class Mailer
{
    private $mailerApiClient;
    private $loggingRepository;
    private $passwordGenerator;
    private $passwordResetter;
    private $userRepository;
    private $entityManager;
    // ...

    public function __construct(
        $mailerApiClient,
        $loggingRepository,
        $passwordGenerator,
        $passwordResetter,
        $userRepository,
        $entityManager
        // ...
    ) {
        $this->mailerApiClient = $mailerApiClient;
        $this->loggingRepository = $loggingRepository;
        $this->passwordGenerator = $passwordGenerator;
        $this->passwordResetter = $passwordResetter;
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    public function sendPasswordResetMail(User $user)
    {
    }

    public function sendOrderConfirmationMail(User $user)
    {
    }

    // ...
}

// Merke: Klassen, die nur "steuern", tendieren dazu, mehr Dependencies zu haben!
