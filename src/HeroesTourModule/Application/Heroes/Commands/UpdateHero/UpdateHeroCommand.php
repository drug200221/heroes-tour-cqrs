<?php

namespace StudentApp\HeroesTourModule\Application\Heroes\Commands\UpdateHero;

use DateTimeImmutable;
use StudentApp\HeroesTourModule\Application\Heroes\HeroCommand;

class UpdateHeroCommand extends HeroCommand
{
    private $id;

    public function __construct($id, $title, \DateTimeImmutable $birthDate)
    {
        parent::__construct($title, $birthDate);
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
