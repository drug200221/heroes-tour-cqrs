<?php

/**
 * auto generated
 */

namespace StudentApp\HeroesTourModule\Repositories\Db\HeroModel;

use Ox3a\Core\ConditionsBuilder\ConditionsBuilder;
use Ox3a\Service\DbServiceInterface;
use StudentApp\HeroesTourModule\Models\HeroModel;
use Zend\Db\Sql\Platform\Platform;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class HeroMapper
 * @package StudentApp\HeroesTourModule\Repositories\Db\HeroModel
 */
class HeroMapper
{
    /** @var string */
    private $table = 'heroes';

    /** @var string */
    private $primaryKey = 'id';

    /**
     * Класс сущности
     * @var string
     */
    private $entityClass = HeroModel::class;

    /** @var DbServiceInterface */
    private $dbService;

    /** @var ConditionsBuilder */
    private $conditionsBuilder;

    /**
     * @param DbServiceInterface $dbService
     * @param ConditionsBuilder  $conditionsBuilder
     */
    public function __construct(DbServiceInterface $dbService, ConditionsBuilder $conditionsBuilder)
    {
        $this->dbService         = $dbService;
        $this->conditionsBuilder = $conditionsBuilder;
    }

    /**
     * Сохранить
     * @param HeroModel $entity
     */
    public function save(HeroModel $entity)
    {
        $hydrator = $this->getHydrator();
        $data     = $hydrator->extract($entity);

        $primaryId = $data[$this->primaryKey];

        if ($primaryId) {
            $this->getTable()->update($data, ["{$this->primaryKey}=?" => $primaryId]);
        } else {
            $this->getTable()->insert($data);
            $primaryId = $this->getTable()->getLastInsertValue();
            $hydrator->hydrate($entity, [$this->primaryKey => $primaryId]);
        }
    }

    /**
     * Найти сущности по условиям
     * @param HeroConditions $conditions
     * @return HeroModel[]
     */
    public function findBy(HeroConditions $conditions)
    {
        $select = $this->getSelect();

        if (($condition = $this->conditionsBuilder->build($conditions->getConditions()))) {
            $select->where($condition);
        }

        if (($order = $conditions->getOrder())) {
            $select->order($order);
        }

        if ($conditions->getLimit()) {
            $select->limit($conditions->getLimit());
            if ($conditions->getOffset()) {
                $select->offset($conditions->getOffset());
            }
        }

        $sql = (new Platform($this->dbService->getAdapter()))->setSubject($select)->getSqlString();

        return array_map(function ($row) {
            return $this->createEntity($row);
        }, $this->dbService->fetchAll($sql));
    }

    /**
     * Удалить
     * @param int $id
     */
    public function delete($id)
    {
        $this->getTable()->delete([$this->primaryKey . '=?' => $id]);
    }

    /**
     * Получить селект для выборки
     * @return Select
     */
    public function getSelect()
    {
        $select = new Select();

        return $select
            ->from(
                $this->table
            )
            ->columns(
                [
                    'id',
                    'name',
                    'birth_date',
                ]
            );
    }

    /**
     * Создать сущность
     * @param array $data
     * @return HeroModel
     */
    public function createEntity($data = [])
    {
        $entityClass = $this->entityClass;
        $entity = new $entityClass();

        $this->getHydrator()->hydrate($entity, $data);

        return $entity;
    }

    /**
     * Получить таблицу
     * @return TableGateway
     */
    protected function getTable()
    {
        return $this->dbService->getTable($this->table);
    }

    /**
     * Получить имя поля первичного ключа
     * @return string
     */
    protected function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * Получить гидратор
     * @return HeroHydrator
     */
    protected function getHydrator()
    {
        return new HeroHydrator();
    }
}
