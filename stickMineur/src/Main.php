<?php

declare(strict_types=1);

namespace wax_dev\stickMineur;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils;

class Main extends PluginBase{

    private static $aqualipd = [];

    function onEnable () : void
    {
        $this->getServer ()->getPluginManager ()->registerEvents (new eventListener(), $this);
        $this->getLogger ()->info ("plugin active");
        self::$aqualipd = $this;
    }


    function onDisable () : void
    {
        $this->getLogger ()->info ("plugin désactive");
        self::$aqualipd = $this;
    }

    protected function GetInstance(){
        return self::$aqualipd;
    }
}
