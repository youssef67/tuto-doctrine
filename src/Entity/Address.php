<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="adresses")
 */
class Address
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
    protected $street;

    /**
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="address")
     */
    protected $user;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;
 
    public function getId() { return $this->id; }
    public function getStreet() { return $this->street; }
    public function getCity() { return $this->city; }
    public function getCountry() { return $this->country; }
    
    public function setStreet($street)
    {
        $this->street = $street;
    }
    
    public function setCity($city)
    {
        $this->city = $city;
    }
    
    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function __toString()
    {
        $format = "Address (id: %s, street: %s, city: %s, country: %s)";
        return sprintf($format, $this->id, $this->street, $this->city, $this->country);
    }
}