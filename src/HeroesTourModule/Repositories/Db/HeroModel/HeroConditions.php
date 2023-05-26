<?php

/**
 * auto generated
 */

namespace StudentApp\HeroesTourModule\Repositories\Db\HeroModel;

use Ox3a\Core\ConditionsBuilder\Conditions;

/**
 * Class HeroConditions
 * @package StudentApp\HeroesTourModule\Repositories\Db\HeroModel
 */
class HeroConditions
{
    /**
     * Порядок сортировки
     * @var string[]
     */
    private $order = [];

    /**
     * Ограничение
     * @var int|null
     */
    private $limit;

    /**
     * Пропуск
     * @var int
     */
    private $offset = 0;

    /**
     * Список условий по полям
     * @var Conditions\ConditionInterface[]
     */
    private $conditions = [];

    /**
     * Список дополнительных условий
     * @var HeroConditions[]
     */
    private $extraConditions = [];

    /**
     * @return Conditions\IntCondition
     */
    public function getId()
    {
        if (!isset($this->conditions['id'])) {
            $this->conditions["id"] = new Conditions\IntCondition("id");
        }
        return $this->conditions['id'];
    }

    /**
     * @return $this
     */
    public function orderById($direction = 'asc')
    {
        if ($direction) {
            $this->order["id"] = $direction;
        } else {
            unset($this->order["id"]);
        }
        return $this;
    }

    /**
     * @return Conditions\StringCondition
     */
    public function getName()
    {
        if (!isset($this->conditions['name'])) {
            $this->conditions["name"] = new Conditions\StringCondition("name");
        }
        return $this->conditions['name'];
    }

    /**
     * @return $this
     */
    public function orderByName($direction = 'asc')
    {
        if ($direction) {
            $this->order["name"] = $direction;
        } else {
            unset($this->order["name"]);
        }
        return $this;
    }

    /**
     * @return Conditions\DateTimeCondition
     */
    public function getBirthDate()
    {
        if (!isset($this->conditions['birthDate'])) {
            $this->conditions["birthDate"] = new Conditions\DateTimeCondition("birth_date");
        }
        return $this->conditions['birthDate'];
    }

    /**
     * @return $this
     */
    public function orderByBirthDate($direction = 'asc')
    {
        if ($direction) {
            $this->order["birth_date"] = $direction;
        } else {
            unset($this->order["birth_date"]);
        }
        return $this;
    }

    /**
     * Очистить сортировку
     * @return $this
     */
    public function clearOrder()
    {
        $this->order = [];
        return $this;
    }

    /**
     * Получить сортировку
     * @return array
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Добавить дополнительные условия
     * @param HeroConditions $conditions
     * @param string $mode
     * @return $this
     */
    public function addConditions(HeroConditions $conditions, $mode = 'AND')
    {
        $this->extraConditions[] = [$conditions, $mode];
        return $this;
    }

    /**
     * Получить дерево условий
     * @return array
     */
    public function getConditions()
    {
        $conditions = [];

        foreach ($this->conditions as $condition) {
            if (($condition = $condition->getCondition())) {
                $conditions[] = [$condition, "AND"];
            }
        }

        foreach ($this->extraConditions as $extraConditions) {
            list($extraConditions, $mode) = $extraConditions;
            if (($extraConditions = $extraConditions->getConditions())) {
                $conditions[] = [$extraConditions, $mode];
            }
        }

        return $conditions;
    }

    /**
     * Получить limit
     * @param int|null $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Получить limit
     * @return int|null
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Получить offset
     * @param int $offset
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Получить offset
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }
}
