<?php

namespace addisonep\jetpack;

Use poceketmine\plugin\PluginBase;
Use pocketmine\Player;
Use pocketmine\command\Command;
Use pocketmine\command\CommandSender;
use pocketmine\player\PlayerItemHeldEvent;
use pocketmine\event\Listener;

class Jetpack extends PluginBase implements CommandExecutor,Listener{
	public $jetpack;
	protected $players;
	
	public function getItem($txt,$default) {
		$e = explode(":",$txt);
		if(count($e)) {
			if (!isset($e[1])) $e[1] = 0;
			$item = Item::fromString($e[0].":".$e[1]);
			if(isset($e[2])) $item->setCount(intval($e[2]));
			if($item->getId() != Item::AIR) {
				return $item;
			}
		}
	}
	
	public function onEnable() {
		$this->saveDefaultConfig();
		$this->reloadConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TextFormat::BLUE . "Jetpack " . + getVersion . "has been loaded.");
	}
	
}
