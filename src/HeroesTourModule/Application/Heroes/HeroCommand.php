<?php

namespace StudentApp\HeroesTourModule\Application\Heroes;

use DateTimeImmutable;

class HeroCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DateTimeImmutable
     */
    private $birthDate;

    public function __construct($name, \DateTimeImmutable $birthDate)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return HeroCommand
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeImmutable $birthDate
     * @return HeroCommand
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }
}
