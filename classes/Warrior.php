<?php

class Warrior extends Character {
    public function __construct($pseudo) 
    {
        parent ::__construct($pseudo);
    }
   
    public function action($target) 
    {
        $rand = rand(1, 10);
        $target->setHP($this->atk + $rand);
        $target->isAlive();
        $status = $this->getName().' attaque '. $target->getName().' qui a '.$target->lifePoint.' points de vie!';
        return $status;
    }

    public function setHP($damage) 
    {
        $this->lifePoint -= $damage;
        return;
    }
}