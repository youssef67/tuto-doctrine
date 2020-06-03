<?php

namespace Tuto\Entity;

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

    public function __toString()
    {
        $format = "Participation (Id: %s, %s, %s)\n";
        return sprintf($format, $this->id, $this->user, $this->poll);
    }

    public function getId() { return $this->id; }
    public function getdate() { return $this->date; }

    public function setDate($date)
    { 
        $this->date = $date;
    }
}