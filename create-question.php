<?php
# create-question.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\Question;
use Tuto\Entity\Answer;

$questionOne = new Question();
$questionOne->setWording("Doctrine 2 est-il un bon ORM ?");

$yes = new Answer();
$yes->setWording("Oui, bien sûr !");
$questionOne->addAnswer($yes);

$entityManager->persist($questionOne);
$entityManager->flush();

echo $question;

