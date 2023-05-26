<?php

namespace StudentApp\HeroesTourModule;

use Ox3a\Common\Module\ModuleInterface;
use Ox3a\Common\StudentApplication;

class HeroesTourModule implements ModuleInterface
{
    public function setApp(StudentApplication $app)
    {
    }

    public function getName()
    {
        return 'HeroesTourModule';
    }

    public function getConfigDir()
    {
        return __DIR__ . '/configs';
    }

    public function getResourceDir()
    {
        return __DIR__ . '/Resources';
    }

    public function bootstrap()
    {
    }
}
