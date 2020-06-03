<?php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\Address;
use Tuto\Entity\User;

$userRepo = $entityManager->getRepository(User::class);

$user = $userRepo->find(1);

$address = new Address();
$address->setStreet('37 rue georges bernanos');
$address->setCity('Strasbourg');
$address->setCountry('France');

$user->setAddress($address);

$entityManager->flush();
