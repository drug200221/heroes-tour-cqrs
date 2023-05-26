<?php

namespace StudentApp\HeroesTourModule\Repositories;

use StudentApp\HeroesTourModule\Models\HeroModel;
use StudentApp\HeroesTourModule\Repositories\Db\HeroModel\HeroConditions;
use StudentApp\HeroesTourModule\Repositories\Db\HeroModel\HeroMapper;

class HeroRepository
{
    /**
     * @var HeroMapper
     */
    private $mapper;

    /**
     * @param HeroMapper $mapper
     */
    public function __construct(HeroMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function save(HeroModel $hero)
    {
        $this->mapper->save($hero);
    }

    public function find($id)
    {
        $conditions = new HeroConditions();
        $conditions->getId()->equal($id);

        $list = $this->findBy($conditions);

        return $list ? $list[0] : null;
    }

    public function findBy(HeroConditions $conditions)
    {
        return $this->mapper->findBy($conditions);
    }

    public function delete(HeroModel $hero)
    {
        if ($hero->getId()) {
            $this->mapper->delete($hero->getId());
        }
    }

    public function getAll()
    {
        return $this->findBy(new HeroConditions());
    }
}
