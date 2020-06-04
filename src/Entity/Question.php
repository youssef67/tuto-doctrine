<?php

namespace Tuto\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity
 *@ORM\Table(name="questions") 
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $wording;

    /**
     * @ORM\OneToMany(targetEntity=Answer::class, cascade={"persist", "remove"}, mappedBy="question")
     */
    protected $answers;

    /**
     * @ORM\ManyToOne(targetEntity=Poll::class, inversedBy="questions")
     */
    protected $poll;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer)
    {
        $this->answers->add($answer);
        $answer->addQuestion($this);
    }

    public function wording() { return $this->wording; }

    public function setWording($wording)
    {
        $this->wording = $wording;
    }

    public function setPoll(Poll $poll)
    {
        $this->poll = $poll;
    }

    public function __toString()
    {
        $format = "Question (id: %s, wording: %s)\n";
        return sprintf($format, $this->id, $this->wording);
    }
}