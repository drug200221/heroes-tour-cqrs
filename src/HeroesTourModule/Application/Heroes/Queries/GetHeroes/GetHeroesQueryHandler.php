<?php

namespace StudentApp\HeroesTourModule\Application\Heroes\Queries\GetHeroes;

use StudentApp\HeroesTourModule\Repositories\HeroRepository;

class GetHeroesQueryHandler
{
    private $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function __invoke(GetHeroesQuery $query)
    {

    }
}
