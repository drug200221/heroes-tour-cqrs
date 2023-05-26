<?php

namespace StudentApp\HeroesTourModule\Application\Heroes\Commands\DeleteHero;

use League\Container\Exception\NotFoundException;
use StudentApp\HeroesTourModule\Repositories\HeroRepository;

class DeleteHeroCommandHandler
{
    private  $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function __invoke(DeleteHeroCommand $command)
    {
        $hero = $this->heroRepository->find($command->getId());

        if ($hero === null) {
            throw new NotFoundException(sprintf('Task with id "%s" is not found', $command->getId()));
        }

        $this->heroRepository->delete($hero);
    }
}
