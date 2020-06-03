<?php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\User;
use Tuto\Entity\Address;

// $userRepo = $entityManager->getRepository(User::class);

$user = new User();
$user->setFirstname('Youssef');
$user->setLastname('Moudni');

$entityManager->persist($user);

$entityManager->flush();





