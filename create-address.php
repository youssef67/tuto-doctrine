<?php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\User;
use Tuto\Entity\Address;

// $userRepo = $entityManager->getRepository(User::class);

$address = new Address();
$address->setStreet('37 rue georges bernanos');
$address->setCity('Strasbourg');
$address->setCountry('France');

$entityManager->persist($address);

$entityManager->flush();



