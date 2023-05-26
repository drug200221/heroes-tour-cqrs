<?php

namespace StudentApp\HeroesTourModule\Application\Heroes\Commands\CreateHero;

use StudentApp\HeroesTourModule\Models\HeroModel;
use StudentApp\HeroesTourModule\Repositories\HeroRepository;

class CreateHeroCommandHandler
{
    private $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function __invoke(CreateHeroCommand $command)
    {
        $hero = new HeroModel();

        $hero->setName($command->getName());
        $hero->setBirthDate($command->getBirthDate());

        $this->heroRepository->save($hero);

        return $hero->getId();
    }
}
