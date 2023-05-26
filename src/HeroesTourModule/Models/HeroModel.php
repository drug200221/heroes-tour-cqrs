<?php

namespace StudentApp\HeroesTourModule\Models;

use DateTimeImmutable;
use JsonSerializable;
use Ox3a\Annotation\Mapping;

/**
 * @Mapping\Table("heroes")
 */
class HeroModel implements JsonSerializable
{
    /**
     * @Mapping\Id()
     * @Mapping\Column("id", type="int")
     * @var int|null
     */
    private $id;

    /**
     * @Mapping\Column("name", type="string")
     * @var string
     */
    private $name;

    /**
     * @Mapping\Column("birth_date", type="DateTime")
     * @var DateTimeImmutable
     */
    private $birthDate;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
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
     * @return HeroModel
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
     * @return HeroModel
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'birthDate' => $this->birthDate->format('Y-m-d'),
        ];
    }
}
