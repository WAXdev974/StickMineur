<?php

declare(strict_types=1);


namespace wax_dev\stickMineur;

use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;

class eventListener implements Listener {


    public function stickMineur(PlayerInteractEvent $wax){
        $player = $wax->getPlayer ();
        $item = $wax->getItem ();
        if($item->getId () === ItemIds::BRICK){
            $player->getInventory ()->setItemInHand (ItemFactory::getInstance ()->get (ItemIds::DIAMOND_PICKAXE, 0, $item->getCount () -1));

            if($player->getEffects ()->has (VanillaEffects::SPEED ())){
                $player->getEffects ()->remove (VanillaEffects::SPEED ());
            }else{
                $speed = new EffectInstance(VanillaEffects::SPEED (), 30*80, 8, false);
                $player->getEffects ()->add($speed);
            }

            if($player->getEffects ()->has (VanillaEffects::HASTE ())){
                $player->getEffects ()->remove (VanillaEffects::HASTE ());
            }else{
                $haste = new EffectInstance(VanillaEffects::HASTE (), 30*80, 15, false);
                $player->getEffects ()->add($haste);
            }
        }
    }
}