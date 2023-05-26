<?php

namespace StudentApp\HeroesTourModule\Application\Heroes\Commands\DeleteHero;

class DeleteHeroCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
