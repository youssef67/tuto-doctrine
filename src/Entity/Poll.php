<?php

namespace Tuto\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="polls")
 */
class Poll
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
    protected $title;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="poll")
     */
    protected $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function addQuestion(Question $question)
    {
        $this->questions->add($question);
        $question->setPoll($this);
    }

    public function __toString()
    {
        $format = "Poll (id: %s, title: %s, created: %s)\n";
        return sprintf($format, $this->id, $this->title, $this->created->format(\Datetime::ISO8601));
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getCreated() { return $this->created; }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }
    
}