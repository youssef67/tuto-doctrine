<?php
# get-user-participations.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\User;

$userRepo = $entityManager->getRepository(User::class);
$user = $userRepo->find(1);

$participations = $user->getParticipations();

foreach ($participations as $participation) {
    echo $participation;
    $choices = $participation->getChoices();
    foreach ($choices as $choice) {
        echo "- ", $choice;
        $answers = $choice->getAnswers();
        echo "-- ", $choice->getQuestion();
        foreach ($answers as $answer) {
            echo "--- ", $answer;
        }
    }
}