<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="answers") 
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $wording;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answers")
     */
    protected $question;

    public function wording() { return $this->wording; }

    public function __toString()
    {
        $format = "Answer (id: %s, wording: %s)\n";
        return sprintf($format, $this->id, $this->wording);
    }

    public function setWording($wording)
    {
        $this->wording = $wording;
    }

    public function addQuestion(Question $question)
    {
        $this->question = $question;
    }


}