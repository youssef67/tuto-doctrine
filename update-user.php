<?php
# update-user.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\User;

$identifiant = 12;

$userRepo = $entityManager->getRepository(User::class);

// Récupération de l'utilisateur (donc automatiquement géré par Doctrine)
$user = $userRepo->find($identifiant);

$user->setFirstname("First Real Modification");
$user->setLastname("Last Real Modification");

$entityManager->flush();