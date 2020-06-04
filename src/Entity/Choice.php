<?php

namespace Tuto\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="choices")
*/
class Choice
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity=Question::class)
    */
    protected $question;

    /**
    * @ORM\ManyToMany(targetEntity=Answer::class)
    * @ORM\JoinTable(name="selected_answers")
    */
    protected $answers;
    
    /**
     * @ORM\ManyToOne(targetEntity=Participation::class, inversedBy="choices")
     */
    protected $participation;
    
    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function __toString()
    {
        $format = "Choice (id: %s)\n";
        return sprintf($format, $this->id);
    }

    public function addAnswer(Answer $answer)
    {
        if ($answer->getQuestion() == $this->question) {
            $this->answers->add($answer);
        }
    }

    public function getId()
    {
        return $this->id;
    }
     
    public function setId($id)
    {
        $this->id = $id;
    }
     
    public function getQuestion()
    {
        return $this->question;
    }
     
    public function setQuestion($question)
    {
        $this->question = $question;
    }
     
    public function getAnswers()
    {
        return $this->answers;
    }

    public function getParticipation()
    {
        return $this->participation;
    }
     
    public function setParticipation($participation)
    {
        $this->participation = $participation;
    }
}