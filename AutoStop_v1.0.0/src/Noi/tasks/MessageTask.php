<?php

namespace Noi\tasks;

use pocketmine\scheduler\Task;


class MessageTask extends Task{

	public function __construct($owner, $time){

		$this->owner = $owner;
		$this->maxtime = $time;

		if($time >= 72000){
			$this->count = intval($time / 72000);
		}

	}


	public function onRun(int $tick){

		$this->TimeSchedule();

	}




	private function TimeSchedule(){

		if(isset($this->count) && $this->maxtime === ($this->count * 72000)){

			$this->owner->getServer()->broadcastMessage(" §e[Server] §b再起動§fまで §a残り{$this->count}時間 §fです");

			if(!$this->count == 0){
				$this->count--;
			}

		}else if($this->maxtime === 54000){
			$this->owner->getServer()->broadcastMessage(" §e[Server] §b再起動§fまで §a残り45分 §fです");

		}else if($this->maxtime === 36000){
			$this->owner->getServer()->broadcastMessage(" §e[Server] §b再起動§fまで §a残り30分 §fです");

		}else if($this->maxtime === 18000){
			$this->owner->getServer()->broadcastMessage(" §e[Server] §b再起動§fまで §a残り15分 §fです");

		}else if($this->maxtime === 12000){
			$this->owner->getServer()->broadcastMessage(" §e[Server] §b再起動§fまで §a残り10分 §fです");

		}else if($this->maxtime === 6000){
			$this->owner->getServer()->broadcastMessage(" §e[Server] §b再起動§fまで §a残り5分 §fです");

		}else if($this->maxtime === 1200){
			$this->owner->getServer()->broadcastMessage(" §e[Server] §b再起動§fまで §c残り1分 §fです");


		}

		$this->maxtime = $this->maxtime - 1200;

	}



}