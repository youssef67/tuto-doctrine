<?php
#create-full-participation.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\Participation;
use Tuto\Entity\Poll;
use Tuto\Entity\User;
use Tuto\Entity\Choice;

$participation = new Participation();

$participation->setDate(new \Datetime("2017-03-04T10:00:00Z"));
$entityManager->persist($participation);
$entityManager->flush(); // Nous devons flusher une premiére fois pour avoir un identifiant pour la participation

$pollRepo = $entityManager->getRepository(Poll::class);
$poll = $pollRepo->find(1);

$userRepo = $entityManager->getRepository(User::class);
$user = $userRepo->find(1);


$participation->setUser($user);
$participation->setPoll($poll);

/*
Poll (id: 1, title: Doctrine 2, ça vous dit ?, created: 2017-03-03T08:00:00+0000)
- Question (id: 2, wording: Doctrine 2 est-il un bon ORM ?)
-- Answer (id: 3, wording: Oui, bien sûr !)
-- Answer (id: 4, wording: Non, peut mieux faire.)
- Question (id: 3, wording: Doctrine 2 est-il facile d'utilisation ?)
-- Answer (id: 5, wording: Oui, il y a une bonne documentation !)
-- Answer (id: 6, wording: Oui, il y a de bons tutoriels !)
-- Answer (id: 7, wording: Non.)
*/

$questions = $poll->getQuestions();

// Choix pour la première question
$questionOne = $questions->get(0);
$answers = $questionOne->getAnswers();

$choice = new Choice();
$choice->setQuestion($questionOne);
$choice->addAnswer($answers->get(0));

$entityManager->persist($choice);
$participation->addChoice($choice);

// Choix pour la deuxième question
$questionTwo = $questions->get(1);
$answers = $questionTwo->getAnswers();

$choice = new Choice();
$choice->setQuestion($questionTwo);
$choice->addAnswer($answers->get(0));
$choice->addAnswer($answers->get(1));

$entityManager->persist($choice);
$participation->addChoice($choice);

$entityManager->flush();

echo $participation;