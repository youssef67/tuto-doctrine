<?php

namespace Tuto\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="participations",
*    uniqueConstraints={
*       @ORM\UniqueConstraint(name="user_poll_unique", columns={"user_id", "poll_id"})
*    }
*  )
*/
class Participation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="participations")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity=Poll::class)
     */
    protected $poll;

    /**
     * @ORM\OneToMany(targetEntity=Choice::class, mappedBy="participation")
     */
    protected $choices;

    public function __construct()
    {
        $this->choices = new ArrayCollection();
    }

    public function __toString()
    {
        $format = "Participation (Id: %s, %s, %s)\n";
        return sprintf($format, $this->id, $this->user, $this->poll);
    }

    public function getId() { return $this->id; }
    public function getdate() { return $this->date; }

    public function setDate(\DateTime $date)
    { 
        $this->date = $date;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function setPoll(Poll $poll)
    {
        $this->poll = $poll; 
    }

    public function addChoice(Choice $choice)
    {
        $this->choices->add($choice);
        $choice->setParticipation($this);
    }

    public function getChoices()
    {
        return $this->choices;
    }
}