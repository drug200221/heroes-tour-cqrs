<?php

namespace StudentApp\HeroesTourModule\Application\Heroes\Commands\UpdateHero;

use League\Container\Exception\NotFoundException;
use StudentApp\HeroesTourModule\Repositories\HeroRepository;

class UpdateHeroCommandHandler
{
    private $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function __invoke(UpdateHeroCommand $command)
    {
        $hero = $this->heroRepository->find($command->getId());

        if ($hero === null) {
            throw new NotFoundException(sprintf('Task with id "%s" is not found', $command->getId()));
        }

        $hero->setName($command->getName());
        $hero->setBirthDate($command->getBirthDate());

        $this->heroRepository->save($hero);
    }
}
