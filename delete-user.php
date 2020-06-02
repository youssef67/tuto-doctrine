<?php
# delete-user.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\User;

$identifiant = 3;

$userRepo = $entityManager->getRepository(User::class);

// Récupération de l'utilisateur (donc automatiquement géré par Doctrine)
$user = $userRepo->find($identifiant);

$entityManager->remove($user);
$entityManager->flush($user);

// Récupération pour vérifier la suppression effective de l'utilisateur
$user = $userRepo->find($identifiant);

var_dump($user); // doit renvoyer NULL