<?php

namespace Noi;

use pocketmine\plugin\PluginBase;
use Noi\tasks\{MessageTask, ShutdownTask};

class AutoStop extends PluginBase {

	public function onEnable() {

		$time = $this->getConfig()->get('time');
		$ms = str_replace("@n", "\n", $this->getConfig()->get('message'));

		$task = new ShutdownTask($this, $ms);
		$task2 = new MessageTask($this, $time);

		$this->getScheduler()->scheduleDelayedTask($task, $time);
		$this->getScheduler()->scheduleRepeatingTask($task2, 1200);

	}

}
