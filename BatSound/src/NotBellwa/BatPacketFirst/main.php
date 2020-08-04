<?php
declare(strict_types=1);
namespace NotBellwa\BatPacketFirst;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;

class main extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onDeath(PlayerDeathEvent $event){
        $player = $event->getPlayer();
        $pk = new PlaySoundPacket();
        $pk->soundName = "mob.bat.death";
        $pk->x = $player->getX();
        $pk->y = $player->getY();
        $pk->z = $player->getZ();
        $pk->volume = 100;
        $pk->pitch = 1;
        $player->sendDataPacket($pk);
    }
}
