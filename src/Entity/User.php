<?php

namespace Tuto\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
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
    protected $firstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, cascade={"persist", "remove"})
     */
    protected $address;

    /**
     * @ORM\OneToMany(targetEntity=Participation::class, mappedBy="user")
     */
    protected $participations;
   
    /**
     * @ORM\ManyToMany(targetEntity=Poll::class)
     */
    protected $polls;

    public function __construct()
    {
        $this->polls = new ArrayCollection();
        $this->participations = new ArrayCollection();
    }

    public function __toString()
    {
        $format = "User (id: %s, firstname: %s, lastname: %s, adress : %s)\n";
        return sprintf($format, $this->id, $this->firstname, $this->lastname, $this->address);
    }

    public function id() { return $this->id; }
    public function firstname() { return $this->firstname; }
    public function lastname() { return $this->lastname; }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }    
}