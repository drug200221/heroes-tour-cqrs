<?php

/**
 * auto generated
 */

namespace StudentApp\HeroesTourModule\Repositories\Db\HeroModel;

use DateTimeImmutable;
use DateTimeInterface;
use ReflectionClass;
use StudentApp\HeroesTourModule\Models\HeroModel;

/**
 * Class HeroHydrator
 * @package StudentApp\HeroesTourModule\Repositories\Db\HeroModel
 */
class HeroHydrator
{
    /**
     * Карта полей
     * @var string[][]
     */
    private $map = ['id' => ['id', 'int'], 'name' => ['name', 'string'], 'birth_date' => ['birthDate', 'DateTime']];

    /**
     * Заполнить объект данными
     * @param HeroModel $object
     * @param array $data
     * @return HeroModel
     */
    public function hydrate(HeroModel $object, array $data)
    {
        foreach ($this->map as $field => $settings) {
            if (array_key_exists($field, $data)) {
                $value         = $data[$field];
                $property      = $settings[0];
                $hydrateMethod = "create" . ucfirst($settings[1]);

                $this->hydrateProperty($object, $property, $this->{$hydrateMethod}($value));
            }
        }

        return $object;
    }

    /**
     * Извлечь данные из объекта
     * @param HeroModel $object
     * @return array
     */
    public function extract(HeroModel $object)
    {
        $dbData = [];

        foreach ($this->map as $field => $settings) {
            $property      = $settings[0];
            $extractMethod = "extract" . ucfirst($settings[1]);

            $dbData[$field] = $this->{$extractMethod}($this->extractProperty($object, $property));
        }

        return $dbData;
    }

    /**
     * Заполнить данными свойство объекта
     * @param HeroModel $object
     * @param string $property
     * @param mixed $value
     * @return void
     */
    private function hydrateProperty(HeroModel $object, $property, $value)
    {
        $reflectionClass = new ReflectionClass($object);

        $reflectionProperty = $reflectionClass->getProperty($property);
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($object, $value);
    }

    /**
     * Извлечь данные из свойства объекта
     * @param HeroModel $object
     * @param string $property
     * @return mixed
     */
    private function extractProperty(HeroModel $object, $property)
    {
        $reflectionClass = new ReflectionClass($object);

        $reflectionProperty = $reflectionClass->getProperty($property);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($object);
    }

    /**
     * Создать строковое значение
     * @param string|null $value
     * @return string|null
     */
    private function createString($value)
    {
        return is_null($value) ? null : ((string)$value);
    }

    /**
     * Извлечь строковое значение
     * @param string|null $value
     * @return string|null
     */
    private function extractString($value)
    {
        return $value;
    }

    /**
     * Создать целочисленное значение
     * @param string|null $value
     * @return int|null
     */
    private function createInt($value)
    {
        return is_null($value) ? null : ((int)$value);
    }

    /**
     * Извлечь целочисленное значение
     * @param int|null $value
     * @return int|null
     */
    private function extractInt($value)
    {
        return $value;
    }

    /**
     * Создать объект даты со временем
     * @param string|null $value
     * @return DateTimeInterface|null
     */
    private function createDateTime($value)
    {
        return $value ? new DateTimeImmutable($value) : null;
    }

    /**
     * Извлечь дату со временем
     * @param DateTimeInterface|null $value
     * @return string|null
     */
    private function extractDateTime($value)
    {
        return $value ? $value->format("Y-m-d H:i:s") : null;
    }
}
